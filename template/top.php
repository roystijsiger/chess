<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            *{
                font-size: 70px;
            }

            td{
                width: 100px;
                height: 100px;
            }

            tr:nth-child(odd) > td:nth-child(odd){
                background-color: white;
            }

            tr:nth-child(odd) > td:nth-child(even){
                background-color: black;
            }

            tr:nth-child(even) > td:nth-child(odd){
                background-color: black;
            }

            tr:nth-child(even) > td:nth-child(even){
                background-color: white;
            }
        </style>
    </head>
    <body>
        