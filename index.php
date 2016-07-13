<html>
<head>
    <meta charset="UTF-8">
    <title>Logs</title>
    <style type="text/css">
        *, *:after, *:before {
            box-sizing: border-box;
        }
        body{
            margin: 0 auto;
            padding: 0;
            font-family: "Arial";
        }
        h1, h2{
            color: #737373;
            padding: 20px;
            display: block;
            text-align: center;
        }
        .div50{
            display: inline-block;
            vertical-align: middle;
            width: 50%;
            margin-left: -3px;
            padding: 20px;
        }
        .flat-table {
            margin-bottom: 20px;
            border-collapse:collapse;
            font-family: 'Lato', Calibri, Arial, sans-serif;
            border: none;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
        }
        .flat-table th, .flat-table td {
            box-shadow: inset 0 -1px rgba(0,0,0,0.25),
            inset 0 1px rgba(0,0,0,0.25);
        }
        .flat-table th {
            font-weight: normal;
            -webkit-font-smoothing: antialiased;
            padding: 1em;
            color: rgba(0,0,0,0.45);
            text-shadow: 0 0 1px rgba(0,0,0,0.1);
            font-size: 1.5em;
        }
        .flat-table td {
            color: #f7f7f7 !important;
            padding: 0.7em 1em 0.7em 1.15em;
            text-shadow: 0 0 1px rgba(255,255,255,0.1);
            font-size: 1.4em;
        }
        .flat-table tr {
            -webkit-transition: background 0.3s, box-shadow 0.3s;
            -moz-transition: background 0.3s, box-shadow 0.3s;
            transition: background 0.3s, box-shadow 0.3s;
        }
        .flat-table-1 {
            background: #336ca6;
        }
        .flat-table-1 tr:hover {
            background: rgba(0,0,0,0.19);
        }
        .flat-table-2 tr:hover {
            background: rgba(0,0,0,0.1);
        }
        .flat-table-3 tr:hover {
            background: rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<h1>Logs ATS</h1>
<div class="div50">
    <canvas id="myPieChart" width="400" height="400"></canvas>
</div>
<div class="div50">
    <table id="tbTotals" class="flat-table flat-table-1">
        <thead>
        <tr>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.0.min.js"
    integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
    crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"
    crossorigin="anonymous"></script>

<script src="script.js"></script>


</body>
</html>
