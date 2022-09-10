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
        <div class="form-check">
            <input wire:model="command" class="form-check-input" type="radio" name="command"
                   id="command_ping" value="ping">
            <label class="form-check-label" for="command_ping">
                Ping
            </label>
        </div>
        <div class="form-check">
            <input wire:model="command" class="form-check-input" type="radio" name="command"
                   id="command_traceroute"
                   value="traceroute">
            <label class="form-check-label" for="command_traceroute">
                Traceroute
            </label>
        </div>
        <div class="mb-3">
            <input type="text" wire:model="target" class="form-control">
        </div>
        <button class="btn btn-primary mb-3">Submit</button>
        @error('command')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
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
