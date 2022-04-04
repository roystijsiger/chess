<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            td{
                width: 100px;
                height: 100px;
                text-align: center;
                vertical-align: center;
                font-size: 50px;
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
        