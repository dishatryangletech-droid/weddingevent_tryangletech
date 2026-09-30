<?php
$c = file_get_contents('resources/views/frontend/contact.blade.php');

$pattern = '/<form[^>]*id="wf-form-Contact-Form-2".*?<\/form>/s';

$replacement = <<<EOD
<form id="wf-form-Contact-Form-2" name="wf-form-Contact-Form-2" data-name="Contact Form" method="POST" action="{{ route('contact.submit') }}" class="fda-contact-form-inner-block">
    @csrf
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px; margin-bottom:20px; background-color:#d4edda; color:#155724; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif
    @if(\$errors->any())
        <div class="alert alert-danger" style="padding:15px; margin-bottom:20px; background-color:#f8d7da; color:#721c24; border-radius:5px;">
            <ul style="margin-bottom:0;">
                @foreach(\$errors->all() as \$error)
                    <li>{{ \$error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input class="fda-form-input-item-v3 w-input" maxlength="256" name="name" placeholder="Your name*" type="text" id="Name-V1" required value="{{ old('name') }}" />
    <input class="fda-form-input-item-v3 w-input" maxlength="256" name="email" placeholder="Email address*" type="email" id="Email-V1" required value="{{ old('email') }}" />
    <input class="fda-form-input-item-v3 w-input" maxlength="10" name="phone" placeholder="Phone number (10 digits)*" type="tel" id="Number-V1" required pattern="[0-9]{10}" title="Phone number must be exactly 10 digits" value="{{ old('phone') }}" />
    
    <select id="Budget-V1" name="budget" required class="fda-select-form w-select">
        <option value="">Estimated overall budget*</option>
        <option value="$20k - $50k" {{ old('budget') == '$20k - $50k' ? 'selected' : '' }}>$20k - $50k</option>
        <option value="$50k - $100k" {{ old('budget') == '$50k - $100k' ? 'selected' : '' }}>$50k - $100k</option>
        <option value="$100k - $250k" {{ old('budget') == '$100k - $250k' ? 'selected' : '' }}>$100k - $250k</option>
        <option value="$250k+" {{ old('budget') == '$250k+' ? 'selected' : '' }}>$250k+</option>
    </select>
    
    <textarea class="fda-form-trext-area w-input" maxlength="5000" name="message" placeholder="Type message" id="Message-V1" required>{{ old('message') }}</textarea>
    
    <label class="w-checkbox fda-checkbox-wrap-v2">
        <div class="w-checkbox-input w-checkbox-input--inputType-custom fda-checkbox"></div>
        <input type="checkbox" id="checkbox-v1" name="terms" style="opacity:0;position:absolute;z-index:-1" required />
        <span class="w-form-label" for="checkbox-v1">I agree to the terms and conditions</span>
    </label>
    
    <div class="fda-admission-button-wrap-v2">
        <div class="fda-button-wrapper">
            <button type="submit" data-wait="Please wait..." class="fda-submit w-button" style="width: auto; padding: 12px 30px; font-size: 16px; border-radius: 30px; background-color: var(--accent--accent-900, #332920); color: white; cursor: pointer; border: none; font-weight: 500;">Submit</button>
        </div>
    </div>
</form>
EOD;

$c = preg_replace($pattern, $replacement, $c);
file_put_contents('resources/views/frontend/contact.blade.php', $c);
echo "Replaced contact form.\n";
