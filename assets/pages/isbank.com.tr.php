<?php 
# 



$cur = new Currency("https://www.isbank.com.tr/_vti_bin/DV.Isbank/FinancialData/FinancialDataService.svc/GetFinancialData?_=" . time());

$doviz = $cur->IsbankKur();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .table-container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #2d3748;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            text-align: left;
            padding: 8px 12px;
            border-bottom: 1px solid #4a5568;
        }
        .table-container th {
            background-color: #2d3748;
            color: #cbd5e0;
        }
        .table-container tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="table-container">
    <p class="antialiased text-gray-100 font-light font-sans font-semibold text-lg "><a href="https://isbank.com.tr" target="_blank" rel="noopener noreferrer" class="transition delay-50 ease-in-out hover:text-blue-600">isbank.com.tr</a> Döviz Kurları</p>
        <?php foreach($doviz as $key => $val): ?>
            <table>
                <thead>
                    <tr>
                        <th><?=$key?> <i class="<?=$val['icon']?>"></i> </th>
                    </tr>
                </thead>

                <tbody class="font-sans">
                    <tr>
                        <td class="cursor-default"><i class="fa-solid fa-money-bill-1-wave text-green-500"></i> <span class="text-gray-100">&nbsp;Alış:</span> <span class="text-green-500 font-semibold"><?=$val["Buy"]?> <i class="fa-solid fa-turkish-lira-sign text-xs"></i></span></td>
                    </tr>
                    <tr>
                        <td class="cursor-default"><i class="fa-solid fa-money-bill-1-wave text-red-500"></i><span class="text-gray-100">&nbsp; Satış: </span><span class="text-red-500 font-semibold"><?=$val["Sell"]?> <i class="fa-solid fa-turkish-lira-sign text-xs"></i></span></td>
                    </tr>
                   
                </tbody>
            </table>
        <?php endforeach; ?>
