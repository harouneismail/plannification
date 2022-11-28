<style>
.page-break {
    page-break-after: always;
}
</style>
    <div class="container">
        <h1>Invoice</h1>
<table>
    <tr>
        <th>Nom wilaya</th>
    </tr>
    <tr>
        @foreach($wilaya as $key)
        <td>{{ $key->nomwilaya }}</td>
        @endforeach
    </tr>
</table>

    </div>
    <div class="page-break"></div>
