<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="container">

        <form>
            <div class="form">
                <div class="formDirection">
                    <label>{{ __('misc.input_name') }}</label>
                    <input type="text" name="name" required>
                </div>
                <div class="formDirection">
                    <label>{{ __('misc.input_email') }}</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="form">
                <div class="formDirection">
                    <label>{{ __('misc.input_question') }}</label>
                    <textarea name="question" cols="47" required></textarea>
                </div>
                
            </div>
            <div class="form">
                <input type="submit" class="formButton" value="{{ __('misc.input_button') }}">
            </div>
        </form>
    </div>

</x-layouts.app>
