@extends('layouts.mail')
@section('title')
    ToyTrader Registration
@stop
@section('content')
    <p>Hi {{ $userName }},</p>
    <p>Thank you for registering with ToyTrader! We are excited to provide a service where you can connect with people who want to rent toys to and from you! Our service is free, and we hope you enjoy trading toys!</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('products.create') }}" target="_blank">List A Toy</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@stop
