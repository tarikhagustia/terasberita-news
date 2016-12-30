<?php
global $template;
global $broker;
include('../classes/Sessions.class.php');
$sessions = New Sessions();
$template->assign_by_ref('sessions', $sessions);
// ob_start("ob_gzhandler");
// include("../includes/functions.php");
// check_permission(array(9));

switch ($_GET['postmode']) {
    case "addbranch" :

        $template->assign("mode", "addbranch");
        //$template->assign("title","Add A NEW BRANCH");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "makenewbranch":

        $branch = $_POST['branch'];
        $broker->new_branch($branch) OR DIE($broker->error_message());
        $sessions->set_flashdata('status', 'Branch ('. $branch . ') created.');
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        // display_message("Branch ($branch) created.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");

        break;

    case "editbranch":
        $branchid = $_GET['branchid'];
        $branch = $broker->fetch_branch($branchid);

        $template->assign("branch", $branch);
        $template->assign("mode", "editbranch");
        // $template->assign("title","EDIT BRANCH");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "editbranch2":
        $branch[branch] = $_POST[branch];
        $branch[branchid] = $_POST[branchid];
        $branch[suspend] = $_POST[suspend];
        $broker->update_branch($branch) OR DIE($broker->error_message());
        $sessions->set_flashdata('status', 'Branch has been updated');
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        // display_message("Branch has been updated", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");
        break;

    /*     * ****************************************************************************
      Group Handlers
     * **************************************************************************** */

    case "editgroup":
        $groupid = $_GET[groupid];

        $group = $broker->fetch_group($groupid);

        $branches = $broker->get_all_branch();
        $template->assign("group", $group);
        $template->assign("mode", "editgroup");
        $template->assign("branches", $branches);
        //$template->assign("title","EDIT GROUP");
        $template->display("an_brokeraccounts_search.htm");

        break;

    case "editgroup2":

        $group['branchid'] = $_POST['branch'];
        $group['groupid'] = $_POST['groupid'];
        $group['group'] = $_POST['group'];


        $test = $broker->update_group($group) OR DIE(display_message($broker->error_message(), "Notice"));

        // In materialze change to flash data
        $sessions->set_flashdata('status', 'Group Has been Update');
        // var_dump($_SESSION);
        // die();
        // $template->assign('session', $session->flashdata('status'));
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        // display_message("Group has been updated.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");

        break;


    case "helpgroup":

        headermessage("To create a group choose a branch and enter your group name", "Help");

    case "deleteaccount":
        $accountname = $_POST[accountname];
        $accountid = $_POST[accountid];
        $query = "SELECT user.userid FROM user WHERE username ='" . $accountname . "'";
        $results = $broker->query($query);
        while ($row = $broker->fetch_array($results)) {
            $userid = $row[userid];
        }
        $query = "select client_tradesettlements.settlementid from client_tradeorders,client_tradesettlements
		where client_tradeorders.tradeid = client_tradesettlements.tradeid
		and client_tradeorders.accountid = '$accountid' ";
        $results = $broker->query($query);
        while ($row = $broker->fetch_array($results)) {
            $settlementid[] = $row[settlementid];
        }
        for ($i_settlementid = 0; $i_settlementid < count($settlementid); $i_settlementid++) {
            $query = "delete from client_tradesettlements where  settlementid ='" . $settlementid[$i_settlementid] . "'";
            $results = $broker->query($query);
        }
        $query = "delete from client_tradeorders where  accountid ='" . $accountid . "'";
        $results = $broker->query($query);
        $query = "delete from trade where account ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from userfield where userid ='" . $userid . "'";
        $results = $broker->query($query);
        $query = "delete from resetuser where userid ='" . $userid . "'";
        $results = $broker->query($query);
        $query = "delete from suspension where account ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from tempcredit where account ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from user where username ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from daily_details where AccNo ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from daily_header where AccNo ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from dafile where AccNo ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from bafile where AccNo ='" . $accountname . "'";
        $results = $broker->query($query);
        $query = "delete from counter_account where accountid ='" . $accountid . "'";
        $results = $broker->query($query);
        $query = "delete from client_margin where accountid ='" . $accountid . "'";
        $results = $broker->query($query);
        $query = "delete from client_balance where accountid ='" . $accountid . "'";
        $results = $broker->query($query);
        $query = "delete from client_accounts where accountname ='" . $accountname . "'";
        $results = $broker->query($query);


        $broker->log_add("The user (" . $_SESSION[username] . ") has delete Account " . $accountname . " with accountid = " . $accountid . " and userid = " . $userid, "Delete Account");
        display_message("Account " . $accountname . " has been deleted.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");
        break;


    case "addgroup":
        $branches = $broker->get_all_branch();
        $template->assign("mode", "addgroup");
        $template->assign("branches", $branches);
        //$template->assign("title","ADD A NEW GROUP");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "makenewgroup":

        $branchid = $_POST[branch];
        $group = $_POST[group];

        $broker->new_group($branchid, $group) OR DIE($broker->error_message());
        $sessions->set_flashdata('status', 'Group (' .$group. ') created.');
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');

    /*     * ****************************************************************************
      AE Handlers
     * **************************************************************************** */

    case "helpaddae":

        headermessage("To create a AE choose a <strong>branch and group</strong> and enter your AE name.", "Help");

    case "addae":

        $branch = array_ae();

        $template->assign("mode", "addae");
        $template->assign("branches", $branch);
        //$template->assign("title","ADD A NEW ACCOUNT EXECUTIVE");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "makenewae":

        $ae[aecode] = $_POST[aecode];
        $ae[groupid] = $_POST[groupid];
        $ae[name] = $_POST[name];
        $ae[telephone_home] = $_POST[telephone_home];
        $ae[telephone_office] = $_POST[telephone_office];
        $ae[telephone_fax] = $_POST[telephone_fax];
        $ae[telephone_mobile] = $_POST[telephone_mobile];
        $ae[email] = $_POST[email];
        $ae[sendmethod] = $_POST[sendmethod];


        $broker->new_ae($ae) OR DIE($broker->error_message());
        $sessions->set_flashdata('status', "AE (" . $ae['aecode'] . ") created.");
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        // display_message("AE (" . $ae[aecode] . ") created.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");
        break;

    case "editae":
        $branch = array_ae();
        $ae = $broker->fetch_ae($_GET[aecodeid]) OR DIE(display_message($broker->error_message(), "Notice"));
        $template->assign("ae", $ae);
        $template->assign("mode", "editae");
        $template->assign("branches", $branch);
        //$template->assign("title","ADD A NEW ACCOUNT EXECUTIVE");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "editae2":

        $ae['aecodeid'] = $_POST['aecodeid'];
        $ae['aecode'] = $_POST['aecode'];
        $ae['groupid'] = $_POST['groupid'];
        $ae['name'] = $_POST['name'];
        $ae['telephone_home'] = $_POST['telephone_home'];
        $ae['telephone_office'] = $_POST['telephone_office'];
        $ae['telephone_fax'] = $_POST['telephone_fax'];
        $ae['telephone_mobile'] = $_POST['telephone_mobile'];
        $ae['email'] = $_POST['email'];
        $ae['sendmethod'] = $_POST['sendmethod'];
        if($broker->update_ae($ae)):
          $sessions->set_flashdata('status', 'Account Executive ('. $ae[name] .') has been updated.');
          $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        else:
          $sessions->set_flashdata('status', $broker->error_message());
          $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        endif;
        // $broker->update_ae($ae) OR DIE($sessions->set_flashdata('status', $broker->error_message())
        // $sessions->set_flashdata('status', 'Account Executive (" . $ae[name] . ") has been updated.');
        // $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        // display_message("Account Executive (" . $ae['name'] . ") has been updated.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");
        break;

    /*     * ****************************************************************************
      Account Handlers
     * **************************************************************************** */
    case "editacc":

        $branch = array_client();
        $account = $broker->fetch_account($_GET[accountid]) OR DIE(display_message($broker->error_message(), "Notice"));
        $template->assign("account", $account);
        $template->assign("mode", "editacc");
        $template->assign("branches", $branch);
        // $template->assign("title","EDIT ACCOUNT");
        $template->display("an_brokeraccounts_search.htm");

        break;

    case "editacc2":
        $acc['accountid'] = $_POST['accountid'];
        $acc['aecodeid'] = $_POST['aecodeid'];
        $acc['accountname'] = $_POST['accountname'];
        $acc['address'] = $_POST['address'];
        $acc['name'] = $_POST['name'];
        $acc['telephone_home'] = $_POST['telephone_home'];
        $acc['telephone_office'] = $_POST['telephone_office'];
        $acc['telephone_fax'] = $_POST['telephone_fax'];
        $acc['telephone_mobile'] = $_POST['telephone_mobile'];
        $acc['email'] = $_POST['email'];
        $acc['daycall'] = $_POST['daycall'];
        $acc['nightcall'] = $_POST['nightcall'];
        $acc['float_rate'] = $_POST['float_rate'];
        $acc['suspend'] = $_POST['suspend'];
        $acc['sendmethod'] = $_POST['sendmethod'];
        // $broker->update_account($acc) OR DIE(display_message($broker->error_message(), "Notice"));
        if($broker->update_account($acc)):
          $sessions->set_flashdata('status', 'Account Executive ('. $ae[name] .') has been updated.');
          $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        else:
          $sessions->set_flashdata('status', $broker->error_message());
          $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');
        endif;
        // display_message("Account (" . $acc[accountname] . ") has been updated.", "Notice", "an_brokeraccounts_search.php?postmode=view_searchuser\" target=\"main");
        break;

    case "helpaddacc":

        headermessage("To create a AE choose a <strong>branch and group and AE or Common</strong> and enter your Account details.", "Help");

    case "addacc":

        $branch = array_client();
        $template->assign("mode", "addacc");
        $template->assign("branches", $branch);
        //$template->assign("title","ADD A NEW ACCOUNT");
        $template->display("an_brokeraccounts_search.htm");
        break;

    case "makenewacc":

        $acc[aecodeid] = $_POST[aecodeid];
        $acc[accountname] = $_POST[accountname];
        $acc[address] = $_POST[address];
        $acc[name] = $_POST[name];
        $acc[telephone_home] = $_POST[telephone_home];
        $acc[telephone_office] = $_POST[telephone_office];
        $acc[telephone_fax] = $_POST[telephone_fax];
        $acc[telephone_mobile] = $_POST[telephone_mobile];
        $acc[email] = $_POST[email];
        $acc[daycall] = $_POST[daycall];
        $acc[nightcall] = $_POST[nightcall];
        $acc[float_rate] = $_POST[float_rate];
        $acc[suspend] = $_POST[suspend];
        $acc[sendmethod] = $_POST[sendmethod];
        $broker->new_account($acc) OR DIE($broker->error_message());
        $sessions->set_flashdata('status', "Account (" . $acc['accountname'] .") has been created ");
        $sessions->redirect('page.php?p=an_brokeraccounts_search.php&postmode=view_searchuser');

        break;

    case "view_searchuser":

        if (!empty($_POST[user])) {
            $query = "SELECT accountid FROM client_accounts WHERE accountname LIKE '%" . $_POST[user] . "%' AND rolldate<='" . $broker->get_rolldate() . "'";
            //tradeLog("An_Brokeraccounts_search-294:".$query);
            $results = $broker->query($query);
            while ($row = $broker->fetch_array($results)) {
                $row2 = $broker->fetch_account_full($row[accountid]);
                $row2[totalmargin] = $broker->dollar($row2[balance]);
                $users[] = $row2;
            }
        }
        if (!empty($_POST[branch])) {
            $query = "SELECT branchid FROM client_branch WHERE branch LIKE '%" . $_POST[branch] . "%' ";
            $results = $broker->query($query);
            while ($row = $broker->fetch_array($results)) {
                $row2 = $broker->fetch_branch($row[branchid]);
                $row2[totalmargin] = $broker->dollar($row2[balance]);
                $users2[] = $row2;
            }
        }

        if (!empty($_POST[group])) {
            $query = "SELECT groupid FROM client_group WHERE client_group.group LIKE '%" . $_POST[group] . "%' ";
            $results = $broker->query($query);
            while ($row = $broker->fetch_array($results)) {
                $row2 = $broker->fetch_group($row[groupid]);
                $row2[totalmargin] = $broker->dollar($row2[balance]);
                $users3[] = $row2;
            }
        }

        if (!empty($_POST[ae])) {
            $query = "SELECT aecodeid FROM client_aecode WHERE aecode LIKE '%" . $_POST[ae] . "%' ";
            $results = $broker->query($query);
            while ($row = $broker->fetch_array($results)) {
                $row2 = $broker->fetch_ae($row[aecodeid]);
                $row2[totalmargin] = $broker->dollar($row2[balance]);
                $users4[] = $row2;
            }
        }
        $template->assign_by_ref('sessions', $sessions);
        $template->assign("postae", $_POST['aecode']);
        $template->assign("postgroup", $_POST['group']);
        $template->assign("postbranch", $_POST['branch']);
        $template->assign("postuser", $_POST['user']);
        $template->assign("users4", $users4);
        $template->assign("users3", $users3);
        $template->assign("users2", $users2);
        $template->assign("users", $users);
        $template->assign("mode", "view_users");
        $template->assign("title", "AN Broker Accounts");

        $template->display("an_brokeraccounts_search.htm");
        break;
}

function array_client() {
    $broker = $GLOBALS[broker];

    $branch = $broker->get_all_branch();
    $group = $broker->get_all_group();
    $aecode = $broker->get_all_aecode();

    for ($i = 0; $group[$i]; $i++) {
        for ($z = 0; $aecode[$z]; $z++) {
            if ($aecode[$z][groupid] == $group[$i][groupid]) {
                $group[$i][aecode][] = $aecode[$z];
            }
        }
    }

    for ($x = 0; $branch[$x]; $x++) {
        for ($y = 0; $group[$y]; $y++) {
            if ($group[$y][branchid] == $branch[$x][branchid]) {
                $branch[$x][groups][] = $group[$y];
            }
        }
    }

    return $branch;
}

function array_ae() {
    $broker = $GLOBALS[broker];
    $branch = $broker->get_all_branch();
    $group = $broker->get_all_group();

    for ($x = 0; $branch[$x]; $x++) {
        for ($y = 0; $group[$y]; $y++) {
            if ($group[$y][branchid] == $branch[$x][branchid]) {
                $branch[$x][groups][] = $group[$y];
            }
        }
    }

    return $branch;
}

?>
