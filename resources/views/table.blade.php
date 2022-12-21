<table class="table ">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Коротке посилання</th>
        <th scope="col">Оригінал</th>
        <th scope="col">Дата створення</th>
        <th scope="col">Дата кінця</th>
        <th scope="col">Лімит кліків</th>
    </tr>
    </thead>
    <tbody>
    @foreach($shortLinks ?? '' as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td><a href="{{ route('shorten.link', $row->code) }}"
                   target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
            <td>{{ $row->link }}</td>
            <td> {{ date('G:i F d', strtotime($row->created_at))}}</td>
            <td> {{ date('G:i F d', strtotime($row->date_del))}} </td>
            <td class="text-center">{{ $row->stats }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
