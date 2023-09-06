@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="table-container">
        <form method="post" action="{{ route('home.store') }}">
        @csrf
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Реден број</th>
                    <th>Име и Презиме</th>
                    <th>Домашно</th>
                    <th>Истражување</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uceniciWithDomasno as $ucenik)
                <tr>
                    <td>{{ $ucenik['ucenici']->iducenici }}</td>
                    <td>{{ $ucenik['ucenici']->imeUcenik }}</td>
                    <td>
                        <select name="domasno_status[]">
                            <option value="нема дадено" class="{{ $ucenik['domasno']->domasno === 'нема дадено' ? 'selected' : '' }}">нема дадено</option>
                            <option value="нема домашно" class="{{ $ucenik['domasno']->domasno === 'нема домашно' ? 'selected' : '' }}">ученик нема</option>
                            <option value="има домашно" class="{{ $ucenik['domasno']->domasno === 'има домашно' ? 'selected' : '' }}">ученик има</option>
                        </select>
                        <input type="hidden" name="user_id[]" value="{{ $ucenik['ucenici']->iducenici }}">
                    </td>
                    <td>
                        <select name="istrazuvanje_status[]">
                            <option value="нема дадено" class="{{ $ucenik['domasno']->istrazuvanje === 'нема дадено' ? 'selected' : '' }}">нема дадено</option>
                            <option value="нема домашно" class="{{ $ucenik['domasno']->istrazuvanje === 'нема домашно' ? 'selected' : '' }}">ученик нема</option>
                            <option value="има домашно" class="{{ $ucenik['domasno']->istrazuvanje === 'има домашно' ? 'selected' : '' }}">ученик има</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Додај</button>
    </form>

    </div>
    </div>
</div>


@endsection
<style>
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    border: 1px solid black; /* Add border to the entire table */
}

th{
    padding-left:10px !important;
}

/* Style the table rows */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Add responsive styles */
.table-container {
    overflow-x: auto;
}

.responsive-table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.responsive-table td, .responsive-table th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

/* Media query for responsiveness */
@media screen and (max-width: 600px) {
    .responsive-table {
        overflow-x: auto;
    }
}
</style>