@php
    $colors = [
        'gradient-green',
        'gradient-red',
        'gradient-purple',
        'gradient-pink',
        'gradient-yellow',
        'gradient-orange',
        'gradient-teal',
    ];
@endphp
<a href="{{ 
auth()->user()->hasRole('admin') ?route('scholarshipcall.edit', $scholarship->id) :
      route('scholarship.call', $scholarship->id) }}"
    class=" group p-4 px-5 mb-2 relative flex justify-center items-center text-sm font-medium text-blue-100 text-center rounded-lg bg-gradient-to-r {{ $colors[$index % count($colors)] }}">
    <h4>{{ $scholarship->name }}</h4>
    <div class="absolute right-4 hidden group-hover:block hover:cursor-pointer group">
        @haspermission('edit scholarship')
        <x-icons.edit class="w-4 h-4"/>
        <div class="bg-black text-xs absolute group-hover:block rounded p-1 -right-8 -top-6 z-10 w-[80px]"><p>Editar Beca</p></div>
        @else
        <x-icons.inscription class="w-4 h-4"/>
        <div class="bg-black text-xs absolute group-hover:block rounded p-1 -right-12 -top-6 z-10 w-[120px]"><p>Postular a la Beca</p></div>
        @endhaspermission
    </div>
</a>
