@extends('layouts.app')

@section('content')

@livewire('menu.menus')

<!-- Product Drawer -->
<x-right-drawer :title='__("modules.menu.addMenu")'>
    @livewire('forms.addMenu')
</x-right-drawer>

    
@endsection