<div id="content">
    <div id="annonce10">
    <center><h2> <? echo $webui_news; ?><p> </h2></center>
    <div id="info">
            <p><strong><? echo $webui_news; ?></strong></p>
        </div>
            <table>
                <?
                $query = "";
                if($_GET[scr] != "") {
                    $query = " where id='".cleanQuery($_GET[scr])."'";
                }
                $DbLink = new DB;
                $DbLink->query("SELECT id,title,message,time from " . C_NEWS_TBL . $query . " ORDER BY time DESC");
                $count = 0;

                while (list($id, $title, $message, $time) = $DbLink->next_record()) {
                    $count++;

                    if (strlen($title) > 92) {
                        $title = substr($title, 0, 64);
                        $title .= "...";
                    }
                    $TIMES = date("l M d Y", $time);
                ?>

                    <tr>
                        <td width="100"><b><?= $TIMES ?></b></td>
                        <td><b> <a href="<?=SYSURL?>index.php?page=news&scr=<?=$id?>" target="_blank"><?=$title?></a></b></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td width="89%"><?= $message ?></td>
                    </tr>

                    <tr>
                        <td colspan="2"><hr /></td>
                    </tr>
                <? } $DbLink->clean_results();
                $DbLink->close(); ?>
            </table>
      </div>
</div>
