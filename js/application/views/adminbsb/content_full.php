<!-- BEGIN PAGE HEADER-->

<div class="block-header">
  <h2>
    <?php echo ( @$_title == "" ) ? @$_page_title : @$_title; ?>
  </h2>
</div>

<div class="card p-t-10">
  <ol class="breadcrumb">
  	<li>
        <a href="<?php echo base_url(); ?>" class="ajaxify">Dashboard</a>
        <?php if ( count(@$_breadcrumb) > 0 ) : ?>
        <?php endif; ?>
    </li>
    <?php if ( count(@$_breadcrumb) > 0 ) : ?>
    <?php $_iBrcmb = 0; foreach( @$_breadcrumb as $brcmb ) : ?>     
        <?php $_BrLink      = @$brcmb[1] != "" ? base_url() . @$brcmb[1] : 'javascript:;'; ?>
        <?php $_BrAjaxify   = @$brcmb[1] != "" ? 'class="ajaxify active"' : 'class=""'; ?>
        <li>
            <a href="<?php echo $_BrLink; ?>" <?php echo  $_BrAjaxify; ?>><?php echo @$brcmb[0]; ?></a>
            <?php if ( $_iBrcmb < ( count(@$_breadcrumb) - 1 ) ) : ?>
            <?php endif; ?>
        </li>
    <?php $_iBrcmb++; endforeach; ?>
    <?php endif; ?>
  </ol>
</div>

<?php echo @$content; ?>

<script type="text/javascript">

</script>
