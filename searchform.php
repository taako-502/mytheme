<form method="get" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>">
  <input type="text" placeholder="キーワード検索" name="s" class="searchfield" value="" />
  <input type="submit" value=""<?php echo isset($_GET['amp']) && $_GET['amp'] == 1 ?  "" : " alt=\"検索\""; ?> title="検索" class="searchsubmit">
</form>
