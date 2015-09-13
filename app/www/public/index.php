<?php

  // BASIC HELLO WORLD DEMO
  // ---------------------------------------------------------------------------
  date_default_timezone_set('UTC');
  echo "<h2>Hello asdsdf!</h2>";
  echo "<p>Today is " . date('l, F jS, Y.') . " Right now it's " .  date('h:i:s A') . " UTC</p>\n";


  // DATABAS DEMO
  // ---------------------------------------------------------------------------
  // Connect to the database
  $dbconn = pg_connect("host=db dbname=postgres user=postgres password=hello")
      or die('Could not connect: ' . pg_last_error());

  // Perform SQL query
  $query = 'SELECT * FROM pg_catalog.pg_tablespace';
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());

  // Print results in HTML
  echo "<table>\n";
  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
      echo "\t<tr>\n";
      foreach ($line as $col_value) {
          echo "\t\t<td>$col_value</td>\n";
      }
      echo "\t</tr>\n";
  }
  echo "</table>\n";

  // Free up memory taken by resultset
  pg_free_result($result);

  // Close the database connection
  pg_close($dbconn);
?>
