<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE HTML>
<?php if (($this->options->htmllang) == ''): ?>
<html lang="zh-Hans"><?php else: ?>
<html lang="<?php $this->options->htmllang(); ?>"><?php endif; ?>

<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php 
    $banner = '';
    $description = '';
    if($this->is('post') || $this->is('page')){
        if(isset($this->fields->banner))
            $banner=$this->fields->banner;
        if(isset($this->fields->excerpt))
            $description = $this->fields->excerpt;
    }else{
        $description = Helper::options()->description;
    }
?>
<title><?php Contents::title($this); ?></title>
<meta name="author" content="<?php $this->author(); ?>" />
<meta name="description" content="<?php if($description != '') echo $description; else echo $this->fields->excerpt; ?>" />
<?php if (($this->options->logoUr1) == ''): ?>
<meta itemprop="image" content="<?php $this->options->siteUrl(); ?>usr/themes/ZERO/images/favicon.png" />
<?php else: ?>
<meta itemprop="image" content="<?php $this->options->logoUr1(); ?>" />
<?php endif; ?>
<meta property="og:title" content="<?php Contents::title($this); ?>" />
<meta property="og:description" content="<?php if($description != '') echo $description; else echo $this->fields->excerpt; ?>" />
<meta property="og:site_name" content="<?php Helper::options()->title(); ?>" />
<meta property="og:type" content="<?php if($this->is('post') || $this->is('page')) echo 'article'; else echo 'website'; ?>" />
<meta property="og:url" content="<?php $this->permalink(); ?>" />
<meta property="og:image" <?php if($this->is('post')||$this->is('page')): ?> content="<?php $this->fields->banner(); ?>"
<?php else: ?>
<?php if (($this->options->logoUr1) == ''): ?>content="<?php $this->options->siteUrl(); ?>usr/themes/ZERO/images/favicon.png" />
<?php else: ?>content="<?php $this->options->logoUr1(); ?>" />
<?php endif; ?><?php endif; ?>
<meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
<meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
<meta name="twitter:title" content="<?php Contents::title($this); ?>" />
<meta name="twitter:description" content="<?php if($description != '') echo $description; else echo $this->fields->excerpt; ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" <?php if($this->is('post')||$this->is('page')): ?>
content="<?php $this->fields->banner(); ?>"
<?php else: ?>
<?php if (($this->options->logoUr1) == ''): ?>content="<?php $this->options->siteUrl(); ?>usr/themes/ZERO/images/favicon.png" />
<?php else: ?>content="<?php $this->options->logoUr1(); ?>" />
<?php endif; ?><?php endif; ?>
<?php if (($this->options->logoUr1) == ''): ?>
<link rel="icon" type="image/png" href="<?php $this->options->siteUrl(); ?>usr/themes/ZERO/images/favicon.png" />
<?php else: ?>
<link rel="icon" type="image/png" href="<?php $this->options->logoUr1(); ?>" />
<?php endif; ?>
<?php $this->header('description=&'); ?>
<?php $this->options->headerEcho(); ?>

<!-- FontAwesome -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/fonts/FontAwesome/4.7.0/css/font-awesome.min.css'); ?>">

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/bootstrap.min.css'); ?>">

<!-- nprogress -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/nprogress.css'); ?>">

<!-- animate -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/animate.min.css'); ?>">

<!-- fancybox -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/jquery.fancybox.min.css'); ?>">

<!-- normalize -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/normalize.min.css'); ?>">

<!-- 代码高亮 -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/tomorrow-night.css'); ?>">

<!-- 0w0 -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/OwO.min.css'); ?>">

<!-- 基本样式 -->
<?php $ver = themeVersion(); ?>
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/ZERO.css?v='. $ver .''); ?>">

<?php if($this->options->zero && $this->options->zero=1): ?>
  <!-- two -->
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/two/two.css'); ?>">
<style>@font-face{font-display: swap;font-family: 'SourceHanSans';src: url('https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900');}
@font-face{font-display: swap;font-family: 'SourceHanSerif';src: url('https://fonts.googleapis.com/css?family=Noto+Serif+SC:200,300,400,500,600,700,900');}</style>
<?php else: ?>
    <?php if($this->options->font && $this->options->font!=0) :?>
<style>@font-face{font-display: swap;font-family: 'Zpix';src: url('/usr/themes/ZERO/fonts/Zpix.ttf');}
@font-face{font-display: swap;font-family: 'Bender';src: url('/usr/themes/ZERO/fonts/Bender.ttf');}
.logo,.pages,.nav-header,.nav-item,footer p,.page-navigator li a,.post-404 h1,.post-404 h3,.post-404 p,.post-404 a{font-family: 'Zpix';}
.posts-date{font-family: 'Bender';font-weight:bold;}</style><?php endif; ?>

<?php endif; ?>




<style><?php $this->options->cssEcho(); ?></style>

<?php if (($this->options->authorName) == ''): ?><style>.comment_meta > .comment-by-author::before {content: "博主";}</style><?php else: ?><style>.comment_meta > .comment-by-author::before {content: "<?php $this->options->authorName(); ?>";}</style><?php endif; ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="body bg-overlay "><?php $this->options->bodytop(); ?>
