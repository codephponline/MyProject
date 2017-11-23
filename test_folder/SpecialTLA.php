<?php

class SpecialTLA extends SpecialPage {
    public function __construct() {
        parent::__construct( 'TLA' );
    }

    /**
     * Show the page to the user
     *
     * @param string $sub The subpage string argument (if any).
     *  [[Special:HelloWorld/subpage]].
     */
    public function execute( $sub ) {
        
        $out = $this->getOutput();
        $out->setPageTitle("TLA Application");

        $wikitext = '
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="theme-color" content="#0b6623">
        <meta name="msapplication-navbutton-color" content="#0b6623">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#0b6623">
        <script src="/extensions/TLA/modules/js/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="/extensions/TLA/modules/js/jquery-ui.min.js"></script>
        <script src="/extensions/TLA/modules/js/jquery.tablesorter.min.js"></script>
        <script src="/extensions/TLA/modules/js/search-tla.js"></script>
        <script src="/extensions/TLA/modules/js/validate.js"></script>
        <link rel="stylesheet" type="text/css" href="/extensions/TLA/modules/css/createnewtla-style.css">
        <link rel="stylesheet" href="/extensions/TLA/modules/css/demo.css">
        <link rel="stylesheet" href="/extensions/TLA/modules/css/sky-forms.css">
        <link rel="stylesheet" href="/extensions/TLA/modules/css/sky-forms-green.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="modules/css/sky-forms-ie8.css">
        <![endif]-->
        
        <!--[if lt IE 10]>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="modules/js/jquery.placeholder.min.js"></script>
        <![endif]-->        
        <!--[if lt IE 9]>
            <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="modules/js/sky-forms-ie8.js"></script>
        <![endif]-->
        <script>
        function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tlaKeywordSearch");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
        </script>
        </head>
        <body>
        <div class="body">
        <p style="color:white;text-align:center;font-size:20px;margin-top:-30px">Welcome to TLA Application</p>
        <form name="add_group" id="add_group" method="POST" class="sky-form">
             
             <header>TLA Keyword Search</header>

            <fieldset>
    
                  <div class="row">
                        <section class="col col-6">
                        <label class="input">
                            <i class="icon-append icon-search get-tla-search-result" style="cursor:pointer"></i>
                            <input id="tla-search" type="text" placeholder="Enter TLA" autocomplete="off" value="ACET">
                        </label>
                    </section>

                    <section class="col col-6">
                        <label class="input" id="checking" style="color:red;margin-top:6px">
                        </label>
                    </section>
                  </div>


                    <div class="row">
                        <section class="col col-12">
                          <table id="tlaKeywordSearch" class="table">
  <thead>
  <tr style="cursor:pointer">
    <th class="tla" onclick="sortTable(0)">TLA</th>
    <th class="def" onclick="sortTable(1)">Definition</th>
  </tr>
  </thead>
   <tbody id="tbodytla">
   <tr style="background-color: rgb(209, 252, 206);"><td><a href="/index.php?title=TLA:ACET%2F1509436478577">ACET</a></td><td>Asset Condition Evaluation Tool</td></tr>
   </tbody>
</table>
                    </div>

            </fieldset>
        
        </form>
        </div>

        </body> 
        </html>';

        $out->addHTML( $wikitext );



    }

    protected function getGroupName() {
        return 'other';
    }

}
