@extends('backend.layouts.grid')
@section('title', admin_lang('Detail Server for ' . $server->country))
@section('back', route('admin.servers.index'))
@section('content')
<div class="card custom-card">
    <table class="datatable50 table w-100">
        <thead>
            <tr>
                <th class="tb-w-2x">{{ admin_lang('Client Id') }}</th>
                <th class="tb-w-7x">{{ admin_lang('Enabled') }}</th>
                <th class="tb-w-7x">{{ admin_lang('Address') }}</th>
                <th class="tb-w-7x">{{ admin_lang('Upload') }}</th>
                <th class="tb-w-7x">{{ admin_lang('Download') }}</th>
                <th class="tb-w-7x">{{ admin_lang('Created At') }}</th>
                <th class="tb-w-3x">{{ admin_lang('Updated At') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->enabled }}</td>
                    <td>{{ $row->address }}</td>
                    <td>{{ number_format($row->transferRx,0,',','.') }}</td>
                    <td>{{ number_format($row->transferTx,0,',','.') }}</td>
                    <td>{{ $row->createdAt }}</td>
                    <td>{{ $row->updatedAt }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
