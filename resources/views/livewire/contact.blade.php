<div>
    <form method="post" role="form" class="php-email-form">

        <div class="row gy-4">
            <div class="col-lg-6 form-group">
                <input type="text" name="name" class="form-control" id="name" wire:model='name' placeholder="Votre Nom">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 form-group">
                <input type="email" class="form-control" name="email" id="email"  wire:model='email' placeholder="Votre Email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" wire:model='phone' placeholder="Téléphone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message"  wire:model='message' rows="5" placeholder="Message"></textarea>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message a été envoyé. Merci !</div>
        </div> --}}
        <div class="text-center"><button type="submit" wire:click.prevent='store()'>Envoyez le Message</button></div>
        @if (session()->has('message'))
            <div class="alert alert-success mt-3">{{ session('message') }}</div>
        @endif
    </form>
</div>
