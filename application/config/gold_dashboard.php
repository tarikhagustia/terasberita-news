<?php

include_once("$_SERVER[DOCUMENT_ROOT]/includes/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/classes/Manager.class.php");
include_once("includes/wr_tools.php");

session_start();

global $user;
global $mysql;
global $tools;
global $template;
global $DB_odbc;
$lines = "a=1";

if ($mysql[crypt_key] != '') {
    $crypt_key = $mysql[crypt_key];
}
//tradeLogDashBoard("DashBoard-14:" . $crypt_key);

if ($user->isadmin) {
    $branches = fetchBrancheGroups();
    $accounts = fetchAccounts("", $user->isadmin, $user->companygroup);
} elseif ($user->ismanager || $user->groupid == 8) {
    $manager = new Manager($user->getUserid());
    $manager->fetchBrancheGroups($DB_odbc);
    $branches = $manager->getBrancheGroups();
    $accounts = $manager->getAccounts();
} elseif ($user->groupid == 1) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
    $account = $accounts[0]; // Make account default
} elseif ($user->groupid == 2) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
    $account = $accounts[0]; // Make account default
} elseif ($user->groupid == 3) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
} elseif ($user->groupid == 4) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
} elseif ($user->groupid == 5) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
    $account = $accounts[0]; // Make account default
} elseif ($user->groupid == 11) {
    $username = $user->getUsername();
    $accounts = fetchAccounts($username, '0', $user->companygroup);
    $account = $accounts[0]; // Make account default
} elseif ($user->groupid == 12) {
    $manager = new Manager($user->userid);
    $manager->fetchBrancheGroups($DB_odbc);
    $manager_accounts = $manager->getAccounts();
    for ($i = 0; $i < count($manager_accounts); $i++) {
        $accounts[$manager_accounts[$i]] = $manager_accounts[$i];
        if (empty($account_init)) {
            $account_init = $manager_accounts[0];
        }
    }
}

if (!$_GET[key]) {
    $key = $_SESSION['key'];
    if (count($key) < 1) {
        display_error("77. You do not have permission to access this page.<br>If you feel this is an error, please contact the Administrator.");
    }
} else {
    $key = $_GET[key];
}
//tradeLogDashBoard("DashBoard-71-key:" . $key);
//$_SESSION[key] = $key;
$template->assign("key", $key);

$tampil_dashboard = 'gg_dashboard.php';
$_SESSION[page] = 'gold_dashboard';
$httphost = strtolower($_SERVER['HTTP_HOST']);
//tradeLogDashBoard("DashBoard-74-Host:" . $httphost);
if (strpos($httphost, 'sakbe') == true) {
    //tradeLogDashBoard("DashBoard-76-Host:" . $httphost);
    $tampil_dashboard = 'gg_dashboard.php';
}
$template->assign("tampil_dashboard", $tampil_dashboard);
$tools = new CTools();
$data = base64_decode(str_replace(array('123', ','), array('+', '/'), $key));
$data = explode("\n", gzuncompress($tools->Crypt($data, $crypt_key)));
//tradeLogDashBoard("DashBoard-118-data:" . $data[0]);
$variabel = explode("&", $data[0]); //a=1&account=1234567
$accountlink = $variabel[1]; //account=1234567
$variabel = explode("=", $accountlink);
$account = $variabel[1];
//tradeLogDashBoard("DashBoard-78:" . $account);

if ($account == 'dummy') {
    $account = $accounts[0];
}
if ($account == '') {
    $account = $accounts[0];
}

if ($account[0] == '') {
    display_error("85.You do not have permission to access this page.<br>If you feel this is an error, please contact the Administrator.");
} else {
    if (!empty($account) && $account != "all") {
        if (!in_array($account, $accounts)) {
            display_error("89.You do not have permission to access this page.<br>If you feel this is an error, please contact the Administrator.");
        }
    }
    for ($icount = 0; $icount < count($accounts); $icount++) {
        $accountkey = "a=1&account=" . $accounts[$icount];
        //tradeLogDashBoard("DashBoard-139:".$accountkey);
        $linezip = gzcompress($accountkey);
        $key2 = str_replace(array('+', '/'), array('123', ','), rtrim(base64_encode($tools->Crypt($linezip, $crypt_key)), '='));
        //tradeLogDashBoard("DashBoard-112-key:" . $key);
        $accountskey[$accounts[$icount]][key] = $key2;
    }
    $_SESSION[account] = $account;
    $template->assign("accounts", $accountskey);
	
	$query = "SELECT bafile.group,branch FROM bafile WHERE accno = '$account'";
	$result = $DB_odbc->query($query);
    $group = "";
	$branch = "";
    while ($row = $DB_odbc->fetch_array($result)) {
        $group = $row[group];
		$branch = $row[branch];
    }
    if (!empty($account)) {
        $template->assign("tradedby", $user->username);
        $template->assign("account", $account);
		$template->assign("group", $group);
		$template->assign("branch", $branch);
        $template->assign("error", "");
    }
}


//tradeLogDashBoard("deposit-79-Account:" . $account);

$filtersearch = "all";

if ($_SESSION['demoorreal'] == 'REAL') {
    $query = "SELECT * FROM mm_will_buy_real  ORDER BY id asc;";
} else {
    $query = "SELECT * FROM mm_will_buy_demo  ORDER BY id asc;";
}
$result = $DB_odbc->query($query);
$ekanilais = array();
while ($row = $DB_odbc->fetch_array($result)) {
    $ekanilais[$row[counterid]] = $row;
    //tradelogDaily("laporanrekening-247-counterid:" . $row[counterid]);
}
mysql_free_result($result);


$statement = fetchStatement($account, $filtersearch, $tools, $crypt_key, $ekanilais, $pengali_interest, $filtersorting);
$json = json_encode($statement);
//tradeLogDashBoard("statement dashboard :".$json);
$template->assign("statement", $statement);

function fetchStatement($account, $filtersearch, $tools, $crypt_key, $ekanilais, $pengali_interest, $filtersorting) {
    global $DB_odbc;
    $wheretambah = " and 1 = 1";

    $query = "select dafile.*,left(dafile.OPEN_TIME,10) as ROLLOPENTIME from dafile 
        where dafile.AccNo = '$account' $wheretambah order by tradeid desc";
    //tradeLogDashBoard("DashBoard-130=" . $query);
    $result = $DB_odbc->query($query);
    $FPL = 0;
    $jumlahrow = 0;
    while ($row = $DB_odbc->fetch_array($result)) {
        $jumlahrow = $jumlahrow + 100;
        // tradeLogDashBoard("DashBoard-341=" . $row[TRADEID]);
        $ekanilai = $ekanilais[$row[COUNTER]];
        if ($row[CLOSE_TIME] == '1970-01-01 00:00:00') {
            $belumliquid = "masihopen";
        } else {
            $belumliquid = "sudahclose";
        }
        if ($row[CMD] == '0') {
            $row['ACTION'] = "Beli";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            //tradeLogDashBoard("DashBoard-223=".$ekanilai[buyprice]);
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            //tradeLogDashBoard("DashBoard-351-Profit:" . $row[PROFIT] . ";CLOSEPRICE_PERUNIT:" . $row['CLOSEPRICE_PERUNIT'] . ";OPENPRICE_PERUNIT:" . $row['OPENPRICE_PERUNIT']);
            $FPL = $FPL + $row[PROFIT];
            if ($belumliquid == "masihopen") {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            } else {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            }
        }
        if ($row[CMD] == '1') {
            $row['ACTION'] = "Jual";
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            $FPL = $FPL + 0;
            if ($belumliquid == "masihopen") {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            } else {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            }
        }
        if ($row[CMD] == '2') {
            $row['ACTION'] = "Beli & Dalam Process Serah Terima";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            $FPL = $FPL + 0;
            if ($belumliquid == "masihopen") {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            } else {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            }
        }
        if ($row[CMD] == '3') {
            $row['ACTION'] = "Beli & Barang sudah diambil";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            $FPL = $FPL + 0;
            if ($belumliquid == "masihopen") {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            } else {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            }
        }
        if ($row[CMD] == '4') {
            $row['ACTION'] = "Akan diJual pada saat jatuh Tempo";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            //tradeLogDashBoard("DashBoard-271=".$ekanilai[buyprice]);
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            $FPL = $FPL + $row[PROFIT];
            if ($belumliquid == "masihopen") {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            } else {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            }
        }
        if ($row[CMD] == '5') {
            $row['ACTION'] = "Beli dan akan di Rollover";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            $FPL = $FPL + $row[PROFIT];
            if ($belumliquid == "masihopen") {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            } else {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            }
        }
        if ($row[CMD] == '6') {
            $row['ACTION'] = "Beli Process Rollover";
            $row['CLOSEPRICE_PERUNIT'] = $ekanilai[buyprice];
            //tradeLogDashBoard("DashBoard-223=".$ekanilai[buyprice]);
            $row[PROFIT] = ($row['CLOSEPRICE_PERUNIT'] - $row['OPENPRICE_PERUNIT']) * $row['QTY'] * $row[PENGALI];
            //tradeLogDashBoard("DashBoard-351-Profit:" . $row[PROFIT] . ";CLOSEPRICE_PERUNIT:" . $row['CLOSEPRICE_PERUNIT'] . ";OPENPRICE_PERUNIT:" . $row['OPENPRICE_PERUNIT']);
            $FPL = $FPL + $row[PROFIT];
            if ($belumliquid == "masihopen") {
                $actionawal = "Beli";
                $actionakhir = "Jual";
            } else {
                $actionawal = "Jual";
                $actionakhir = "Beli";
            }
        }
        $row['actionawal'] = $actionawal;
        $row['actionakhir'] = $actionakhir;
        $statement[adadata] = "ada";
        $statement[$row[CMD]][qty] = $statement[$row[CMD]][qty] + $row[QTY];
        $tradeidKey = "a=1&account=" . $account . "&tradeid=" . $row[TRADEID];
        $tradeidKey = $tradeidKey . "&barcode=" . $row[BARCODE];
        //tradeLogDashBoard("DashBoard-231-tradeidKey:" . $tradeidKey);
        $tradeidzip = gzcompress($tradeidKey);
        $keytradeid = str_replace(array('+', '/'), array('123', ','), rtrim(base64_encode($tools->Crypt($tradeidzip, $crypt_key)), '='));
        //tradeLogDashBoard("DashBoard-235-keytradeid:" . $tradeidzip);       
        $row[topup] = $keytradeid;
        //tradeLogDashBoard("DashBoard-424-FPL:" . $FPL . ";Dafile_TradeId:" . $row[TRADEID]);
        $statement[dafile][] = $row;
    }
    if ($jumlahrow > 1000) {
        $jumlahrow = 1000;
    }
    $jumlahrow = $jumlahrow + 100;

    $query = "select bafile.*,client_accounts.status 
        from bafile,client_accounts  
        where 
        bafile.AccNo = client_accounts.accountname 
        and bafile.AccNo  = '$account'";
    //tradeLogDashBoard("DashBoard-269=".$query);
    $result = $DB_odbc->query($query);
    while ($row = $DB_odbc->fetch_array($result)) {
        $row[FPL] = $FPL;
        $row[PL_PLJUAL] = $row[PL] + $row[PLJUAL];
        //tradeLogDashBoard("DashBoard-470-PL_PLJUAL" . $row[PL_PLJUAL] . "; PL=" . $row[PL] . "; PLJual=" . $row[PLJUAL]);
        $row[INTEREST] = $row[INTEREST] * $pengali_interest;
        //tradeLogDashBoard("DashBoard-305=" . $row[INTEREST] . "; pengali_interest=" . $pengali_interest);

        $row[NEWBAL] = $row[PREVBAL] + $row[MARGININ] + $row[MARGINOUT] + $row[PL] + $row[PLJUAL] + $row[COMMISSION] + $row[CETAK] + $row[ROLLOVER] + $row[DELIVER] + $row[STORAGE] + $row[INTEREST] + $row[ADJUST];

        $row[FREEM] = $row[NEWBAL] + $row[MR1] + $row[MR2];
        $row[CALLMARGIN] = $row[FREEM] + $row[FPL];
        if($row[CALLMARGIN]>0){
            $row[CALLMARGIN]=0;
        }
        $statement[status] = $row;
    }
    $statement[jumlahrow] = $jumlahrow;

    //tradeLogDashBoard("DashBoard-300=" . $statement[status][status]);

    if ($statement[status][status] == 'normal' || $statement[status][status] == 'mmreal' || $statement[status][status] == 'mmrema' || $statement[status][status] == 'mmdemo' || $statement[status][status] == 'mmdema'
    ) {
        $query = "select bafile_gold.* from bafile_gold where bafile_gold.`ACCNO` = '$account'";
        //tradeLogDashBoard("DashBoard-483=".$query);
        $result = $DB_odbc->query($query);
        while ($row_gold = $DB_odbc->fetch_array($result)) {
            $row_gold[MR1] = $row_gold[MR1] * -1;
            $row_gold[MR2] = $row_gold[MR2] * -1;
            $statement[bafile_gold] = $row_gold;
        }

        $statement[bafile_gold][MR1RP] = $jumlahinitial * -1;

        $statement[bafile_gold][MR2RP] = $jumlahdeposit * -1;

        //$statement[bafile_total][MR1TotRP] = $statement[bafile][MR1] - $statement[bafile_gold][MR1RP];
        $statement[bafile_total][MR1TotRP] = $statement[status][MR1] + $statement[bafile_gold][MR1RP];
        //tradeLogDashBoard("DashBoard-586-statement[bafile][MR1]:" . $statement[bafile][MR1] . ";statement[bafile_gold][MR1RP]:" . $statement[bafile_gold][MR1RP]);
        //$statement[bafile_total][MR2TotRP] = $statement[bafile][MR2] - $statement[bafile_gold][MR2RP];
        $statement[bafile_total][MR2TotRP] = $statement[bafile_gold][MR2RP];

        $statement[bafile_gold][NEWBAL] = $statement[bafile_gold][PREVBAL] + $statement[bafile_gold][MARGININ] 
                + $statement[bafile_gold][MARGINOUT] + $statement[bafile_gold][PL] + $statement[bafile_gold][PLJUAL] + $statement[bafile_gold][COMMISSION] + $statement[bafile_gold][CETAK] + $statement[bafile_gold][ROLLOVER] + $statement[bafile_gold][STORAGE] + $statement[bafile_gold][INTEREST] + $statement[bafile_gold][ADJUST];
        //tradeLogDashBoard("DashBoard-593-statement[bafile][NEWBAL]:" . $statement[bafile_gold][NEWBAL]);
        $statement[bafile_total][FREEM] = $statement[status][FREEM] + $statement[bafile_gold][MR1RP] + $statement[bafile_gold][MR2RP];
        //tradeLogDashBoard("DashBoard-314-statement[bafile][NEWBAL]:" . $statement[bafile][NEWBAL].
        //        ";".$statement[bafile_gold][MR1RP].";statement[bafile][MR2RP]:" . $statement[bafile_gold][MR2RP]);

        //tradeLogDashBoard("DashBoard-325-statement[bafile_gold][FREEM]:" . $statement[bafile_gold][FREEM] . ";FPL:" . $statement[bafile_total][FPL]);
        $statement[bafile_total][CALLMARGIN] = $statement[bafile_total][FREEM] + $statement[bafile][FPL];
        if($statement[bafile_total][CALLMARGIN] >0){
            $statement[bafile_total][CALLMARGIN] =0;
        }
        $statement[bafile_gold][CALLMARGIN] = $statement[bafile_gold][FREEM] + $statement[bafile_gold][FPL];
        if($statement[bafile_gold][CALLMARGIN]>0){
           $statement[bafile_gold][CALLMARGIN]=0; 
        }
    }
	
	if ($statement[status][status] == 'normal' || $statement[status][status] == 'mmreal' || $statement[status][status] == 'mmrema' || $statement[status][status] == 'mmdemo' || $statement[status][status] == 'mmdema'
    ) {
        $query = "select bafile_usd.* from bafile_usd where bafile_usd.`ACCNO` = '$account'";
        //tradeLogDashBoard("DashBoard-bafile_usd-query-483=".$query);
        $result = $DB_odbc->query($query);
        while ($row_usd = $DB_odbc->fetch_array($result)) {
            $row_usd[MR1] = $row_usd[MR1] * -1;
            $row_usd[MR2] = $row_usd[MR2] * -1;
            $statement[bafile_usd] = $row_usd;
        }
		$json = json_encode($statement[bafile_usd]);
		//tradeLogDashBoard("Dashboard-bafile_usd-360 :".$json);
        $statement[bafile_usd][MR1RP] = $jumlahinitial * -1;

        $statement[bafile_usd][MR2RP] = $jumlahdeposit * -1;

        //$statement[bafile_total][MR1TotRP] = $statement[bafile][MR1] - $statement[bafile_gold][MR1RP];
        $statement[bafile_total][MR1TotRP] = $statement[status][MR1] + $statement[bafile_usd][MR1RP];
        //tradeLogDashBoard("DashBoard-586-statement[bafile][MR1]:" . $statement[bafile][MR1] . ";statement[bafile_gold][MR1RP]:" . $statement[bafile_gold][MR1RP]);
        //$statement[bafile_total][MR2TotRP] = $statement[bafile][MR2] - $statement[bafile_gold][MR2RP];
        $statement[bafile_total][MR2TotRP] = $statement[bafile_usd][MR2RP];

        $statement[bafile_gold][NEWBAL] = $statement[bafile_usd][PREVBAL] + $statement[bafile_usd][MARGININ] 
                + $statement[bafile_usd][MARGINOUT] + $statement[bafile_usd][PL] + $statement[bafile_usd][PLJUAL] + $statement[bafile_usd][COMMISSION] + $statement[bafile_usd][CETAK] + $statement[bafile_usd][ROLLOVER] + $statement[bafile_usd][STORAGE] + $statement[bafile_usd][INTEREST] + $statement[bafile_usd][ADJUST];
        //tradeLogDashBoard("DashBoard-593-statement[bafile][NEWBAL]:" . $statement[bafile_gold][NEWBAL]);
        $statement[bafile_total][FREEM] = $statement[status][FREEM] + $statement[bafile_usd][MR1RP] + $statement[bafile_usd][MR2RP];
        //tradeLogDashBoard("DashBoard-314-statement[bafile][NEWBAL]:" . $statement[bafile][NEWBAL].
        //        ";".$statement[bafile_gold][MR1RP].";statement[bafile][MR2RP]:" . $statement[bafile_gold][MR2RP]);

        //tradeLogDashBoard("DashBoard-325-statement[bafile_gold][FREEM]:" . $statement[bafile_gold][FREEM] . ";FPL:" . $statement[bafile_total][FPL]);
        $statement[bafile_total][CALLMARGIN] = $statement[bafile_total][FREEM] + $statement[bafile][FPL];
        if($statement[bafile_total][CALLMARGIN] >0){
            $statement[bafile_total][CALLMARGIN] =0;
        }
        $statement[bafile_usd][CALLMARGIN] = $statement[bafile_usd][FREEM] + $statement[bafile_usd][FPL];
        if($statement[bafile_usd][CALLMARGIN]>0){
           $statement[bafile_usd][CALLMARGIN]=0; 
        }
    }
    return $statement;
}

function fetchAccounts($username, $isadmin = 0, $cabang_admin) {
    global $DB_odbc;
    global $user;

    if ($isadmin) {
        if ($cabang_admin == 'semua') {
            $query = "SELECT trim(accountname) AS account FROM client_accounts where accountname !='' ORDER BY accountname asc";
        } else {
            $query = "SELECT TRIM(client_accounts.accountname) AS account 
                    FROM client_accounts,client_aecode,client_group,client_branch  
                    WHERE client_accounts.accountname !='' 
                    AND client_accounts.aecodeid = client_aecode.`aecodeid` 
                    AND client_aecode.groupid = client_group.`groupid` 
                    AND client_group.branchid = client_branch.branchid 
                    AND client_branch.branch = '$cabang_admin' 
                    ORDER BY client_accounts.accountname ASC";
            //tradeLogDashBoard("DashBoard-83=".$query);
        }
    } else {
        if ($user->groupid == '3') {
            $query = "select accountreal from user where username = '" . $username . "' ";
            $result = $DB_odbc->query($query);
            $accounts_panjang = "";
            while ($row = $DB_odbc->fetch_array($result)) {
                $accounts_panjang = $row[accountreal];
            }
            if ($accounts_panjang != '') {
                $accounts = explode(",", $accounts_panjang);
            }
        }
        if ($user->tradingtype == 'AccNo') {
            $query = "SELECT trim(AccNo) AS account FROM bafile WHERE " . $user->tradingtype . "='$username' ORDER BY AccNo";
        }
        if ($user->groupid == '2') {
            $query = "SELECT trim(AccNo) AS account FROM bafile WHERE AccNo='$username' ORDER BY AccNo";
        }
        if ($user->groupid == '3') {
            $query = "SELECT TRIM(client_accounts.accountname) AS account 
                FROM client_accounts,client_aecode  
                WHERE client_accounts.accountname !='' 
                AND client_accounts.aecodeid = client_aecode.aecodeid 
                AND client_aecode.aecode = '" . $username . "' 
                ORDER BY client_accounts.accountname ASC";
        }
        if ($user->groupid == '4' || $user->groupid == '5') {
            $query = "SELECT trim(AccNo) AS account FROM bafile WHERE bafile.AeCode='$user->userfield_aecode' ORDER BY AccNo";
        }
        if ($user->tradingtype == 'Group') {
            $query = "SELECT trim(AccNo) AS account FROM bafile WHERE bafile." . $user->tradingtype . "='$user->userfield_group' ORDER BY AccNo";
        }
    }
    //tradeLogDashBoard("tempstatement-257=".$query);
    $result = $DB_odbc->query($query);
    while ($row = $DB_odbc->fetch_array($result)) {
        $accounts[] = $row[account];
    }
    if ($accounts[0] == '') {
        $accounts[0] = 'dummy';
    }
    return $accounts;
}

function fetchBrancheGroups() {
    global $DB_odbc;

    $query = "SELECT trim(Branch) AS branchid, trim(AccNo) AS account FROM bafile ORDER BY AccNo";

    $result = $DB_odbc->query($query);
    while ($row = $DB_odbc->fetch_array($result)) {
        $branches[$row[branchid]][] = $row[account];
    }
    return $branches;
}

$template->assign("demoorreal", $_SESSION['demoorreal']);

global $DB;
$dateall = array();
$dateambil = "daily";
$query = "SELECT * from broker_settings";
$result = $DB->query($query);
while ($row = $DB->fetch_array($result)) {
    if ($row[settings] == 'current_rolldate') {
        $dateall[] = $row[value];
        if ($datesearch == $row[value]) {
            $dateambil = "bafile";
        }
        if ($datesearch == '') {
            $dateambil = "bafile";
            $datesearch = $row[value];
        }
    }
    if ($row[settings] == 'interestaf') {
        $pengali_interest = 1;
        if ($row[value] == 'intnext') {
            $pengali_interest = 0;
        }
    }
}

$template->assign("dateambil", $dateambil);

$query = "SELECT VALUE FROM broker_settings WHERE settings='current_rolldate';";
$result = $DB->query($query);
while ($row = $DB->fetch_array($result)) {
    $date1 = $row[VALUE];
}
$date7 = substr($date1, 0, 7);
$query = "SELECT * FROM rolloverdate WHERE 
    rolloverallowed <= '$date1' 
    AND LEFT(rolloverclose,7) = '$date7'";
//tradeLogDashBoard("LaporanRekening-193:" . $query);
$result = $DB->query($query);
$akhirbulan = "tidak";
while ($row = $DB->fetch_array($result)) {
    $akhirbulan = "iya";
}

if($user->username=='ALBERTOSCARINA' || $user->username=='THEPROGRAMMER'){
    $akhirbulan = "iya";
}
$template->assign("akhirbulan", $akhirbulan);


//mysql_free_result($result);
$template->display("gold_dashboard.htm");


function tradeLogDashBoard($msg) {
    $fp = fopen("trader.log", "a");
    $logdate = date("Y-m-d H:i:s => ");
    $msg = preg_replace("/\s+/", " ", $msg);
    fwrite($fp, $logdate . $msg . "\n");
    fclose($fp);
    return;
}

?>