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
                background-color: white;
            }

            tr:nth-child(odd) > td:nth-child(even){
                background-color: grey;
                color: white;
            }

            tr:nth-child(even) > td:nth-child(odd){
                background-color: grey;
                color: white;
            }

            tr:nth-child(even) > td:nth-child(even){
                background-color: white;
            }
        </style>
    </head>
    <body>
        