<?php
if(isset($_GET['amp']) && $_GET['amp'] == 1 ) {
  //AMP ?>
  <form method="get"
      class="searchform"
      action="<?php echo esc_url( home_url('/') ); ?>"
      target="_blank ">
    <fieldset>
      <input type="text" placeholder="キーワード検索" name="s" class="searchfield" value="" />
      <input type="submit" value="" title="検索" class="searchsubmit">
    </fieldset>
  </form>
<?php
} else {
  //通常?>
  <form method="get" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>">
    <input type="text" placeholder="キーワード検索" name="s" class="searchfield" value="" />
    <input type="submit" value="" alt="検索" title="検索" class="searchsubmit">
  </form>
<?php } ?>
