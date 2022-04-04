<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            table{
                border:none;
            }

            td{
                width: 90px;
                height: 90px;
                text-align: center;
                vertical-align: center;
                font-size: 45px;
                border: none;
                -webkit-text-stroke: 2px black; /* width and color */
            }

            tr:nth-child(odd) > td:nth-child(odd){
                background-color: #eeeed2;
            }

            tr:nth-child(odd) > td:nth-child(even){
                background-color: #769656;
            }

            tr:nth-child(even) > td:nth-child(odd){
                background-color: #769656;
            }

            tr:nth-child(even) > td:nth-child(even){
                background-color: #eeeed2;
            }
        </style>
    </head>
    <body>
        