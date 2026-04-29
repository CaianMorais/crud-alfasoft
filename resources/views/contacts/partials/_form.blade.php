<div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
           id="name" value="{{ old('name', $contact->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact" class="form-label">Contato</label>
    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" 
           id="contact" value="{{ old('contact', $contact->contact ?? '') }}" required>
    @error('contact')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
           id="email" value="{{ old('email', $contact->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>