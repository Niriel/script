@extends('layouts.app')

@section('title', 'Grocery list items')

@section('content')
    <h1>Items</h1>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Bescrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    Bewerken                    /                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
