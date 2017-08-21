<!DOCTYPE html>
    <HTML>
        <HEAD>
                  <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title></title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        
        <!-- Bootstrap core CSS     -->
        <link href="http://sandbox.thaiepay.com//assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Dashboard core CSS    -->
        <link href="http://sandbox.thaiepay.com//assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="http://sandbox.thaiepay.com//assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="http://sandbox.thaiepay.com//assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <link href="http://sandbox.thaiepay.com//assets/css/bootstrap-toggle.min.css" rel="stylesheet" />  
        </HEAD>
<link href="http://sandbox.thaiepay.com//assets/css/fresh-bootstrap-table.css" rel="stylesheet" type="text/css"/>



<style type="text/css">
    .btn.btn-my {
        color: #FFFFFF;
        background-color: #0076CE;
        opacity: 1;
        filter: alpha(opacity=100);
        font-size:12px;
        border-radius: 1.925em;
    }
    .btn.btn-my:hover, .btn.btn-fill:focus, .btn.btn-fill:active, .btn.btn-fill.active, .open > .btn.btn-fill.dropdown-toggle {
        background-color: #007ddb;
        color: #FFFFFF;
    }
</style>

<BODY>
    
    
    
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="content">
                           <table  class="table" >
                            <tr>
                                <td width="50">        
                                    <label for="date"><FONT SIZE="2">Date:</FONT></label>
                                </td>
                                <td width="200">                                         
                                    <input  class="form-control datepicker" type='text' name='startdate' id="startdate" value="" placeholder='Start Date' style="width: 180px">                                           
                                </td>
                                <td width="1">
                                    -
                                </td>
                                <td width="200">                                                           
                                    <input  class="form-control datepicker" type='text' name='enddate' id="enddate" value=""  placeholder='End Date' style="width: 180px"> 
                                </td>
                                <td width="200">
                                    <input name="btnSubmit" type="submit" value="ตกลง" class="btn btn-default btn-fill">
                                </td>
                                <td></td>
                                
                               
                            </tr>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



            
            
</BODY>
        
  <script src="http://sandbox.thaiepay.com/assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="http://sandbox.thaiepay.com/assets/js/bootstrap-table.js"></script>
<script type="text/javascript">
    var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'),
            full_screen = false;

    $().ready(function () {
        $table.bootstrapTable({
            toolbar: ".toolbar",
            search: true,
            pagination: true,
            striped: true,
            pageSize: 10,
            pageList: [10, 25, 50, 100],

            formatShowingRows: function (pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..." 
            },
            formatRecordsPerPage: function (pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });



        $(window).resize(function () {
            $table.bootstrapTable('resetView');
        });
    });
</script>
<script type="text/JavaScript">
    var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
    return function (table, name, filename) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }

    document.getElementById("dlink").href = uri + base64(format(template, ctx));
    document.getElementById("dlink").download = filename;
    document.getElementById("dlink").click();

    }
    })()
</script>
<script type="text/javascript">
    $().ready(function () {

        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    });
</script>



        </div>

        <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="http://sandbox.thaiepay.com//assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap.min.js" type="text/javascript"></script>


        <!--  Forms Validations Plugin -->
        <!--<script src="http://sandbox.thaiepay.com//assets/js/jquery.validate.js" type="text/javascript"></script>-->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery.validate.min.js"></script>

        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="http://sandbox.thaiepay.com//assets/js/moment.min.js"></script>

        <!--  Date Time Picker Plugin is included in this js file -->
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-datetimepicker.js"></script>

        <!--  Select Picker Plugin -->
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-selectpicker.js"></script>

        <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

        <!--  Charts Plugin -->
        <script src="http://sandbox.thaiepay.com//assets/js/chartist.min.js"></script>

        <!--  Notifications Plugin    -->
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-notify.js"></script>

        <!-- Sweet Alert 2 plugin -->
        <script src="http://sandbox.thaiepay.com//assets/js/sweetalert2.js"></script>

        <!-- Vector Map plugin -->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery-jvectormap.js"></script>

        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>

        <!-- Wizard Plugin    -->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery.bootstrap.wizard.min.js"></script>

        <!--  Bootstrap Table Plugin    -->
        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-table.js"></script>

        <!--  Plugin for DataTables.net  -->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery.datatables.js"></script>


        <!--  Full Calendar Plugin    -->
        <script src="http://sandbox.thaiepay.com//assets/js/fullcalendar.min.js"></script>

        <!-- Light Bootstrap Dashboard Core javascript and methods -->
        <script src="http://sandbox.thaiepay.com//assets/js/light-bootstrap-dashboard.js"></script>

        <!--   Sharrre Library    -->
        <script src="http://sandbox.thaiepay.com//assets/js/jquery.sharrre.js"></script>

        <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
        <script src="http://sandbox.thaiepay.com//assets/js/demo.js"></script>

        <script src="http://sandbox.thaiepay.com//assets/js/bootstrap-toggle.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                demo.initDashboardPageCharts();
                demo.initVectorMap();

                /*$.notify({
                 icon: 'pe-7s-bell',
                 message: "<b>Light Bootstrap Dashboard PRO</b> - forget about boring dashboards."
             
                 },{
                 type: 'warning',
                 timer: 4000
                 });*/

            });
        </script>
    </HTML>
