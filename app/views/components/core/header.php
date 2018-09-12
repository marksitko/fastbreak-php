<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<?php if ( CRAWL_APP == 'true' && ( !isset($data['crawlPage']) || $data['crawlPage']) ) : ?>
		<meta name="robots" content="index, follow">
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo APP_URL; ?>/css/style.css">

	<title><?php echo APP_NAME; ?></title>

	<?php if ( isset($data['description']) && !empty($data['description']) ) : ?>
		<meta name="description" content="<?php echo $data['description']; ?>">
	<?php endif; ?>

	<?php if (isset($data['canonical']) && !empty($data['canonical'])) : ?>
		<link rel="canonical" href="<?php echo APP_URL . $data['canonical']; ?>">
	<?php endif; ?>
</head>

<body 
<?php if (isset($data['bodyClasses']) && !empty($data['bodyClasses'])) : ?>
	class="<?php echo $data['bodyClasses']; ?>"
<?php endif; ?>
>