<?php 

class Currency{
    private $link;
    public function __construct($link){
        $this->link = $link;
    }
    public function AkbankKur(){
        $ch = curl_init($this->link);
    
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
        ]);
        
        $output = curl_exec($ch);
        curl_close($ch);
        
        $output = json_decode($output,true);
        
        $results = json_decode($output['GetExchangeDataResult'],true);
    
        $usd = $results['Currencies'][16];
        $eur = $results['Currencies'][6];
        $gbp = $results['Currencies'][7];
        $xau = $results['Currencies'][18];
        
        return [
            "USD" =>[
                "Rate" => $usd['Rate'],
                "Buy" => $usd["Buy"],
                "Sell" => $usd["Sell"],
                "icon" => "fa-solid fa-dollar-sign text-green-400"
                   ],
            "EUR" =>[
                "Rate" => $eur['Rate'],
                "Buy" => $eur["Buy"],
                "Sell" => $eur["Sell"],
                "icon" => "fa-solid fa-euro-sign text-blue-500"
                   ],
            "GBP" =>[
                "Rate" => $gbp['Rate'],
                "Buy" => $gbp["Buy"],
                "Sell" => $gbp["Sell"],
                "icon" => "fa-solid fa-sterling-sign text-yellow-500"
                   ],
            
            ];
    }

    public function IsbankKur(){
        $ch = curl_init($this->link. time());
    
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
        ]);
        
        $output = curl_exec($ch);
        curl_close($ch);
        
        $output = json_decode($output,true);
        
        $results = $output['Data']['Market'];


        $usd = $results[0];
        $eur = $results[1];
        $gbp = $results[2];
        $xau = $results[3];

    
        return [
            $usd['Code'] => [
                "Buy" => $usd["FxRateBuy"],
                "Sell" => $usd["FxRateSell"],
                "icon" => "fa-solid fa-dollar-sign text-green-400"
            ],
            $eur['Code'] => [
                "Buy" => $eur["FxRateBuy"],
                "Sell" => $eur["FxRateSell"],
                "icon" => "fa-solid fa-euro-sign text-blue-500"
            ],
            $gbp['Code'] => [
                "Buy" => $gbp["FxRateBuy"],
                "Sell" => $gbp["FxRateSell"],
                "icon" => "fa-solid fa-euro-sign text-yellow-500"
            ],
           
        ];
    }

    public function GenelParaKur(){
        $ch = curl_init($this->link);
    
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
        ]);
        
        $output = curl_exec($ch);
        curl_close($ch);
        
        $output = json_decode($output,true);

        $usd = $output['USD'];
        $eur = $output['EUR'];
        $gbp = $output['GBP'];
        $btc = $output['BTC'];
        $eth = $output['ETH'];
        return [
            "USD" => [
                "Buy" => $usd['alis'],
                "Sell" => $usd['satis'],
                "Rate" => $usd['degisim'],
                "RateMove" => $usd['d_yon'] == "caret-up" ? 1 : 0,
                "icon" => "fa-solid fa-dollar-sign text-green-400"
            ],
            "EUR" => [
                "Buy" => $eur['alis'],
                "Sell" => $eur['satis'],
                "Rate" => $eur['degisim'],
                "RateMove" => $eur['d_yon'] == "caret-up" ? 1 : 0,
                "icon" => "fa-solid fa-euro-sign text-blue-500"
            ],
            "GBP" => [
                "Buy" => $gbp['alis'],
                "Sell" => $gbp['satis'],
                "Rate" => $gbp['degisim'],
                "RateMove" => $gbp['d_yon'] == "caret-up" ? 1 : 0,
                "icon" => "fa-solid fa-sterling-sign text-yellow-500"
            ],
            "BTC" => [
                "Buy" => $btc['alis'],
                "Sell" => $btc['satis'],
                "Rate" => $btc['degisim'],
                "RateMove" => $btc['d_yon'] == "caret-up" ? 1 : 0,
                "icon" => "fa-brands fa-bitcoin text-yellow-600"
            ],
            "ETH" => [
                "Buy" => $eth['alis'],
                "Sell" => $eth['satis'],
                "Rate" => $eth['degisim'],
                "RateMove" => $eth['d_yon'] == "caret-up" ? 1 : 0,
                "icon" => "fa-brands fa-ethereum text-gray-800"
            ],

        ];
    }
}

