<div>
	<h1 class="text-2xl font-bold mb-8">Users
		<span class="text-xl text-gray-600 font-normal">List of users</span>
	</h1>
	<div class="space-y-6">
		<x-table>
			<x-slot name="head">
				<x-table.heading class="text-left">ID</x-table.heading>
				<x-table.heading class="text-left">Name</x-table.heading>
				<x-table.heading class="text-left">e-mail</x-table.heading>
				<x-table.heading class="text-center">Status</x-table.heading>
				<x-table.heading></x-table.heading>
			</x-slot>
			<x-slot name="body">
				@forelse ($users as $user)
					<x-table.row wire:loading.class.delay="opacity-50">
						<x-table.cell>{{ $user->id }}</x-table.cell>
						<x-table.cell class="text-left">{{ $user->name }}</x-table.cell>
						<x-table.cell class="text-left">{{ $user->email }}</x-table.cell>
						<x-table.cell class="text-center">
                            <span
	                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold leading-4 bg-{{ $user->isActive ? 'green' : 'red' }}-100 text-{{ $user->isActive ? 'green' : 'red' }}-800 capitalize">
                            {{ $user->isActive ? 'Active' : 'Deactivated' }}
                            </span>
						</x-table.cell>
						<x-table.cell class="text-right">
							<x-icons.edit wire:click="edit({{ $user->id }})" />
						</x-table.cell>
					</x-table.row>
				@empty
					<x-table.row>
						<x-table.cell colspan="6">
							<div class="flex justify-center items-center space-x-2">
								<span class="font-medium py-8 text-cool-gray-400 text-xl">No users...</span>
							</div>
						</x-table.cell>
					</x-table.row>
				@endforelse
			</x-slot>
		</x-table>
		<div>
			{{ $users->links() }}
		</div>
	</div>
	
	<!-- Edit Modal -->
	<form wire:submit.prevent="save">
		<x-modal.dialog wire:model.defer="showEditModal" position="absolute">
			<x-slot name="title">Edit user </x-slot>
			<x-slot name="content">
				<x-input.group for="name" label="Name" :error="$errors->first('user.name')">
					<x-input.text wire:model="user.name" placeholder="Name" />
				</x-input.group>
				<x-input.group for="email" label="e-mail" :error="$errors->first('user.email')">
					<x-input.text wire:model="user.email" placeholder="e-mail" />
				</x-input.group>
				
				<x-input.group for="user.active" label="User active?" :error="$errors->first('user.active')" toggle>
					<x-input.toggle wire:model="user.active" color="red" />
					Active status ====> {{ $this->user->active }}
				</x-input.group>
			</x-slot>
			
			<x-slot name="footer">
				<x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>
				<x-button.primary type="submit">Save</x-button.primary>
			</x-slot>
		</x-modal.dialog>
	</form>
</div>