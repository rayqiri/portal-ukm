<?php
function ratingkomentator(){
 global $wpdb;
 $hasil = $wpdb->get_var('
  SELECT
   COUNT(comment_ID)
  FROM
   '.$wpdb->comments.'
  WHERE
   comment_author_email = "'.get_comment_author_email().'"'
 );
 if($hasil <=20 ):
  echo "&hearts;";
 elseif($hasil >=21 && $hasil <=40):
  echo "&hearts;&hearts;";
 elseif($hasil >=41 && $hasil <=80):
  echo "&hearts;&hearts;&hearts;";
 elseif($hasil >=81 && $hasil <=120):
  echo "&hearts;&hearts;&hearts;&hearts;";
 elseif($hasil >=121 && $hasil <=1000):
  echo "&hearts;&hearts;&hearts;&hearts;&hearts;";
 else :
  echo "";
 endif;
}
?>