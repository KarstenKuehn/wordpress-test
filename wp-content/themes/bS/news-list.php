<div class="main news_feed">
<?php

    $catname = 'News';
    $category = get_category_by_slug($catname); 
    $cat_id = $category->term_id;
	$args = array(
	        'category'       => $cat_id,
	    	'sort_order' 	 => 'desc',
	    	'posts_per_page'   => -1
	    );
	$posts = get_posts($args);

?>

<?php


$year = date('Y');
if(isset($_GET['selected_year']))
	$year = $_GET['selected_year'];

$cat_filter=0;
$sub_cat1 = '';
$cat1_checked = '';
if(isset($_GET['sub_cat1']))
{	
	$sub_cat1 = 'Gewinner News';
	$cat_filter=1;
	$cat1_checked = ' checked';
}
$sub_cat2 = '';
$cat2_checked = '';
if(isset($_GET['sub_cat2']))
{
	$sub_cat2 = 'Unternehmen News';
	$cat_filter=1;
	$cat2_checked =  ' checked';
}

$filter_word = '';
if(isset($_GET['filter_word']))
{
	$filter_word = $_GET['filter_word'];
	$cat_filter=0;
	$cat1_checked = '';
	$cat2_checked = '';
}


foreach ($posts as $key => $post) 
{

    $sub_cat = $catname;
    $id = $post->ID;
    $cat = get_the_category($id);
    foreach ($cat as $key => $value) {

        if($cat_id == $value->category_parent)
        {
            $sub_cat = $value->name;
        }
    } 
	$date = DateTime::createFromFormat('d.m.y', @get_field('datum'))->format('Y-m-d');
	if (strlen($post->post_title) > 1)
	{
        $img='/wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';
        if($sub_cat=='Unternehmen News')
        $img='/wp-content/uploads/2021/06/Presse-Unternehmens-News_2000x1100.jpg';
        if($sub_cat=='Gewinner News')
        $img='/wp-content/uploads/2021/06/Presse-News_Gewinnernews_2000x1100.jpg';
  		if (strlen(get_the_post_thumbnail_url()) > 0)
		{
			$img = get_the_post_thumbnail_url();
		}	
		if($cat_filter==0)
		{
			$title=$post->post_title;
			$excerpt = get_the_excerpt($post->ID);



			if($filter_word!='')
			{

				if((stripos($title, $filter_word)===false) && (stripos($excerpt, $filter_word)===false))
				{
					//echo '<br>-----'.' '.$filter_word;
				}
				else
				{
					$pages[] = array(
					'ID' => $post->ID,
					'post_title' => wp_trim_words(substr($post->post_title,0 ,100),7, ' […]'), 
					'date' => $date,
					'excerpt'	=> wp_trim_words(substr(get_the_excerpt($post->ID),0 ,150),15, ' […]'  ),
					'link'		=> get_permalink(),
					'category'	=> get_the_category()[0]->name,
					'sub_category'  => $sub_cat,
					'thumb'		=> $img,
	
				);

				}

			}
			else
			{		$pages[] = array(
					'ID' => $post->ID,
					'post_title' => wp_trim_words(substr($post->post_title,0 ,100),7, ' […]'), 
					'date' => $date,
					'excerpt'	=> wp_trim_words(substr(get_the_excerpt($post->ID),0 ,150),15, ' […]'  ),
					'link'		=> get_permalink(),
					'category'	=> get_the_category()[0]->name,
					'sub_category'  => $sub_cat,
					'thumb'		=> $img,
	
				);
			}

		}
		else
		{
			if(($sub_cat==$sub_cat1)|| ($sub_cat==$sub_cat2))
			{
				$pages[] = array(
					'ID' => $post->ID,
					'post_title' => wp_trim_words(substr($post->post_title,0 ,100),7, ' […]'), 
					'date' => $date,
					'excerpt'	=> wp_trim_words(substr(get_the_excerpt($post->ID),0 ,150),15, ' […]'  ),
					'link'		=> get_permalink(),
					'category'	=> get_the_category()[0]->name,
					'sub_category'  => $sub_cat,
					'thumb'		=> $img,

				);
			}
		}
		$years[] = date('Y',strtotime($date));
	}
}

$years = array_unique($years);
?>

<section class="news-liste">
<div class="events_header news_filter">
<div id="filter">

<div class="custom-select_x" >
<select id="select_year">
<!--<option value="0">Select Year:</option>-->
<?php

/*
function sortDesc( $a, $b ) {
	if (isset($b["date"]) && isset($a["date"]))
	{
		return strtotime($b["date"]) - strtotime($a["date"]);	
	} 
}function sortAsc( $a, $b ) {
	if (isset($b["date"]) && isset($a["date"]))
	{
		return strtotime($a["date"]) - strtotime($b["date"]);	
	} 
}
*/
//$selectedYear = date('Y');

$selectedYear = $year;

foreach($years as $key => $year_select)
{
	if ($year_select == $selectedYear)
	{
		echo '<option selected="selected">'.$year_select.'</option>';
	}
	else
	{
		echo '<option>'.$year_select.'</option>';
	}
	
}


?>
</select>
</div>
<?php
$s1=' selected';
$s2='';
$sortierung = "sortDesc";

if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
	if($sort=='desc')
	{
		$s1=' selected="selected"';
		$s2='';
		$sortierung = "sortDesc";
	}
	if($sort=='asc')
	{
		$s1='';
		$s2=' selected="selected"';
		$sortierung = "sortAsc";
	}	
}

?>

<div class="custom-select_x" >

<select id="select_sort">
	<!--    <option value="0">Select car:</option>-->
	<?php
echo '<option'.$s1.' name="sort" value="desc">Nachrichten absteigend</option>';
echo '<option'.$s2.' name="sort" value="asc">Nachrichten aufsteigend</option>';
?>
</select>
</div>
<div class="cat">
<div class="cat_check">
  <label for="cat1">Gewinner</label>
  <input type="checkbox" id="cat1" name="sub_cat1" class="cat_check_box"<?php echo $cat1_checked; ?>>

</div>
<div class="cat_check">
  <label for="cat2">Unternehmens News</label>
  <input type="checkbox" id="cat2" name="sub_cat2" class="cat_check_box"<?php echo $cat2_checked; ?>>
</div>
</div>
</div>

<div class="searchformfld" id="search-filter">
            <input type="text" name="filter_word" value="<?php echo $filter_word ?>" id="filter_word" class="text-field" onClick="this.select()" placeholder=" "/>
            <label for="filter_word">Suchbegriff eingeben</label>
            <button onclick="searchStart()" class="mobile_hidden"><span class="material-icons">search</span></button>
        </div>
                    <button onclick="searchStart()" class="button desktop_hidden">Suche</button>
</div>

<!-- spalten_3 || spalten_2 -->
<div class="news spalten_3">


<?php

//usort($pages, "sortDesc");


usort($pages, $sortierung);
$i = 1;

foreach ($pages as $key => $post) 
{
	if (isset($post['date']) && isset($post['excerpt']) && isset($post['link']) && isset($post['category']) )
	{
		$search_text='';
		if (preg_match('@'.$year.'@',$post['date']) && ( (preg_match('@'.$search_text.'@',$post['post_title']))  || (preg_match('@'.$search_text.'@',$post['excerpt']))))
		{
			if ($i++ <= 6)
			{
				echo '<div class="news_container active">';	
			}
			else
			{
				echo '<div class="news_container">';
			}
			echo '<div class="bg-image" style="background-image:url(\''.$post['thumb'].'\');"/></div>';
			echo '<div class="news_frame">';
			echo date('d.m.y',strtotime($post['date']));
			echo '<h2>'.$post['post_title'].'</h2>';
			echo '<p>'.$post['excerpt'].'</p>';
			echo '</div>';
			echo '<a href="'.$post['link'].'" class="list">'.$post['sub_category'].'<span class="material-icons">east</span></a>';
			echo '</div>';
		}
	}
}

?>
<button onclick="showAllNews()">+ mehr laden</button>
</div>
</section>
</div>
<script>

var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
          	console.log(s);

        for (i = 0; i < sl; i++) {
        	  s.selectedIndex = -1;
          if (s.options[i].innerHTML == this.innerHTML) {              
          	console.log(s);
            s.selectedIndex = i;
                      	
            console.log(i);
						s.options[i].setAttribute("selected","selected");                      	
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);




var filter = document.getElementById('filter');
filter.onchange = function() {
	year="selected_year="+document.getElementById('select_year').value;
	sort="sort="+document.getElementById('select_sort').value;
	cat1='sub_cat1=1';
	cat2='sub_cat2=1';
	var parameters_arr = [];
	parameters_arr.push(year);
	parameters_arr.push(sort);
	if (document.getElementById('cat1').checked) {
	parameters_arr.push(cat1);
	} 

	if (document.getElementById('cat2').checked) {
	parameters_arr.push(cat2);
	}
	var parameters = parameters_arr.join('&');
	location.href = location.pathname + "?"+parameters;
}

function searchStart()
{
	year="selected_year="+document.getElementById('select_year').value;
	var parameters_arr = [];
	parameters_arr.push(year);
	filter_word = "filter_word="+document.getElementById('filter_word').value;
	parameters_arr.push(filter_word);

	var parameters = parameters_arr.join('&');
	location.href = location.pathname + "?"+parameters;
}


var elem = document.getElementById('select_year');
elem.addEventListener('change', Auswählen);

function Auswählen() {
	/*
    var x = document.getElementById('select_year').value;
var url = new URL(location.href);
var c = url.searchParams.get("selected_year");
location.href = location.pathname + "?selected_year=" + x;
*/


}

	function showAllNews(){var e,s=document.getElementsByClassName("news_container");for(e=0;e<s.length;e++)s[e].classList.add("active")}</script>