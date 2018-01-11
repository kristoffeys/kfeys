@extends('layouts.backend')

@section('content')
	<div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
		<div class="hidden lg:flex">
			<div class="w-1/3 text-center py-8">
				<div class="border-r">
					<div class="text-grey-darker mb-2">
						<span class="text-5xl">{{ $postCount }}</span>
					</div>
					<div class="text-sm uppercase text-grey tracking-wide">
						Posts
					</div>
				</div>
			</div>
			<div class="w-1/3 text-center py-8">
				<div class="border-r">
					<div class="text-grey-darker mb-2">
						<span class="text-5xl">{{ $pageCount }}</span>
					</div>
					<div class="text-sm uppercase text-grey tracking-wide">
						Pages
					</div>
				</div>
			</div>
			<div class="w-1/3 text-center py-8">
				<div>
					<div class="text-grey-darker mb-2">
						<span class="text-5xl">{{ $categoryCount }}</span>
					</div>
					<div class="text-sm uppercase text-grey tracking-wide">
						Categories
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
