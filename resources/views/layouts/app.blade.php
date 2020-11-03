<!DOCTYPE html>
<html dir="ltr" lang="en_EN" class="text-gray-900 bg-gray-200 leading-snug subpixel-antialiased font-montserrat tracking-wide">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@livewireStyles
		<title>Title</title>
		<link rel="stylesheet" href="{{ mix('/css/styles.css') }}">
	</head>
	<body class="min-h-screen">
		<main class="mx-4">
			<div class="max-w-7xl mx-auto my-6 sm:px-6 lg:px-6 bg-white">
				<div class="px-4 py-8 sm:px-0 mx-2">
					{{ $slot }}
				</div>
			</div>
		</main>
		
		@livewireScripts
		<script src="{{ mix('/js/scripts.js') }}"></script>
	</body>
</html>