<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>";
echo "<frameset rows=\"25%,*\">
      <frame src=\"frame1.php\" name=\"top\" target=\"bottom\"></frame>
      <frame src=\"\" name=\"bottom\" target=\"_self\">	</frame>
      </frameset>";
?>