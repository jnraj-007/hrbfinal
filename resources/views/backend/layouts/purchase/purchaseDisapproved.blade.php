@extends('welcome')
@section('page')



    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>Id</th>
        <th>User Id</th>
        <th>User Name</th>
        <th>Package Id</th>
        <th>Package Name</th>
        <th>Package Price</th>
        <th>Amount Paid</th>
        <th>Transaction ID</th>
        <th>Request Date</th>
        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($disapprovedRequests as $key=> $package)
            <tr>
                <th scope="row"> {{$package->id}}</th>
                <td> {{$package->userId}}</td>
                <td>{{$package->userdata->name}} </td>
                <td>{{$package->package_id}} </td>
                <td> {{$package->packageName}}</td>
                <td> {{$package->package_price}}</td>
                <td> {{$package->amountToPay}}</td>
                <td> {{$package->transactionId}}</td>
                <td> {{$package->created_at}}</td>
                <td>{{$package->status}} </td>
                <td>
                    <a class="btn-sm btn-info" style="text-decoration: none" href="{{route('approve.purchase.request',[$package->id,$package->userdata->name])}}">Approve</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$disapprovedRequests->links()}}
@endsection