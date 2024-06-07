<table>
    <tr><td colspan="4" style="text-align: center; weight:700px; font-size:20px;"><strong> Super School ORG</strong></td></tr>
    <thead>
    <tr>
        <th style="text-align: left; weight:600px;"><strong>Sr No.</strong></th>
        <th style="text-align: left;weight:600px;"><strong>Name</strong></th>
        <th style="text-align: left;weight:600px;"><strong>Email</strong></th>
        <th style="text-align: left;weight:600px;"><strong>Ticket Code</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $soldTicket)
        <tr>
            <td style="text-align: left; width:100px;"> {{ $key + 1}}</td>
            <td style="text-align: left; width:200px;"> {{ $soldTicket->name }}</td>
            <td style="text-align: left; width:300px;"> {{ $soldTicket->email }} </td>
            <td style="text-align: left; width:200px;">{{ $soldTicket->ticket_code }}</td>
        </tr>
    @endforeach
    </tbody>
</table>