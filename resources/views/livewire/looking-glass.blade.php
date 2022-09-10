<div>
    <form wire:submit.prevent="submit">
        <h3>Select Router</h3>
        @foreach($routers as $router)
            <div class="form-check">
                <input wire:model="selected_router_id" class="form-check-input" type="radio" name="selected_router_id"
                       id="selected_router_id[{{$router->id}}]" value="{{$router->id}}">
                <label class="form-check-label" for="selected_router_id[{{$router->id}}]">
                    {{ $router->name }}
                </label>
            </div>
        @endforeach
        <h3>Select Command</h3>
        @foreach($commands as $command)
            <div class="form-check">
                <input wire:model="command" class="form-check-input" type="radio" name="command"
                       id="command_{{$command}}" value="{{$command}}">
                <label class="form-check-label" for="command_{{$command}}">
                    {{$command}}
                </label>
            </div>
        @endforeach


        <div class="mb-3">
            <input type="text" wire:model="target" class="form-control">
        </div>
        <button class="btn btn-primary mb-3">Submit</button>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <h3>Outputs</h3>
    <div>
        @foreach($outputs as $output)
            <div class="bg-dark text-white p-2 mb-2">
                <pre>
{{ $output }}
            </pre>
            </div>
        @endforeach
    </div>
</div>
