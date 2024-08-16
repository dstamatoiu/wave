<?php
    use function Laravel\Folio\{middleware, name};
    name('dashboard');
    middleware('subscribed');
?>

<x-layouts.app>
	<x-app.container x-data class="space-y-6" x-cloak>
        
		<x-app.alert id="dashboard_alert">This is the user dashboard where users can manage settings and access features. <a href="https://devdojo.com/wave/docs" target="_blank" class="mx-1 underline">View the docs</a> to learn more.</x-app.alert>

        <x-app.heading
                title="Dashboard"
                description="Welcome to an example applicaction dashboard. Find more resources below."
                :border="false"
            />

        <div class="flex space-x-5 w-full">
            <x-app.dashboard-card
				href="/docs"
				target="_blank"
				title="Documentation"
				description="Learn how to customize your app and make it shine!"
				link_text="View The Docs"
				image="/wave/img/docs.png"
			/>
			<x-app.dashboard-card
				href="https://devdojo.com/questions"
				target="_blank"
				title="Ask The Community"
				description="Share your progress and get help from other builders."
				link_text="Ask a Question"
				image="/wave/img/community.png"
			/>
        </div>

		<div class="flex space-x-5 w-full">
			<x-app.dashboard-card
				href="https://github.com/thedevdojo/wave"
				target="_blank"
				title="Github Repo"
				description="View the source code and submit a Pull Request"
				link_text="View on Github"
				image="/wave/img/laptop.png"
			/>
			<x-app.dashboard-card
				href="/resources"
				target="_blank"
				title="Resources"
				description="View resources that will help you build your SaaS"
				link_text="View Resources"
				image="/wave/img/globe.png"
			/>
		</div>

		<div class="block relative py-6"><hr class="border-gray-100 dark:border-gray-800" /></div>

		@subscriber
			<p>You are a subscribed user with the <strong>{{ auth()->user()->roles()->first()->name }}</strong> role. Learn <a href="https://devdojo.com/wave/docs/features/roles-permissions" target="_blank" class="underline">more about roles</a> here.</p>
			<x-app.message-for-subscriber />
		@elsenotsubscriber
			<p>This current logged in user has a <strong>{{ auth()->user()->roles()->first()->name }}</strong> role. To upgrade, <a href="{{ route('settings.subscription') }}" class="underline">subscribe to a plan</a>. Learn <a href="https://devdojo.com/wave/docs/features/roles-permissions" target="_blank" class="underline">more about roles</a> here.</p>
		@endsubscriber
		
		@admin
			<x-app.message-for-admin />
		@elsenotadmin
			
		@endadmin
    </x-app.container>
</x-layouts.app>
