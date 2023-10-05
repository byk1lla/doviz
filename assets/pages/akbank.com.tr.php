<?php 



$cur = new Currency("https://www.akbank.com/_vti_bin/AkbankServicesSecure/FrontEndServiceSecure.svc/GetExchangeData?_=". time());

$doviz = $cur->AkbankKur();



?>

    <div class="table-container">
    <p class="antialiased text-gray-100 font-light font-sans font-semibold text-lg "><a href="https://akbank.com.tr" target="_blank" rel="noopener noreferrer" class="transition delay-50 ease-in-out hover:text-red-500">Akbank.com.tr</a> Döviz Kurları</p>
        <?php foreach($doviz as $key => $val): ?>
            <table>
                <thead>
                    <tr>
                        <th><i class="text-<?= $val['Rate'] > 0 ? "green": "red"?>-400 fa-solid fa-angle-<?= $val['Rate'] > 0 ? "up": "down"?> text-sm"></i> <?=$key?> <i class="<?=$val['icon']?>"></i> </th>
                    </tr>
                </thead>
                
                <tbody class="font-sans">
                    <tr>
                        <td class="cursor-default"><i class="fa-solid fa-money-bill-1-wave text-green-500"></i> <span class="text-gray-100">&nbsp;Alış:</span> <span class="text-green-500 font-semibold"><?=$val["Buy"]?> <i class="fa-solid fa-turkish-lira-sign text-xs"></i></span></td>
                    </tr>
                    <tr>
                        <td class="cursor-default"><i class="fa-solid fa-money-bill-1-wave text-red-500"></i><span class="text-gray-100">&nbsp; Satış: </span><span class="text-red-500 font-semibold"><?=$val["Sell"]?> <i class="fa-solid fa-turkish-lira-sign text-xs"></i></span></td>
                    </tr>
                    <tr>
                        <td class="cursor-default"><i class="fas fa-chart-line text-yellow-400"></i><span class="text-gray-100">&nbsp; Fark:</span>  <span class="text-<?= $val['Rate'] > 0 ? "green": "red"?>-400 font-semibold"><?=sprintf("%.2f",$val["Rate"])?>% </span></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
        




