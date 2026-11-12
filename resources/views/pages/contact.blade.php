@extends('layouts.app')

@section('title', 'Request a Quote & Contact Us | Veyora Media')
@section('meta_description', 'Contact the editorial desk at Veyora Media to request a media placement quote, check magazine availability, or discuss your brand PR campaign.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">Get In Touch</span>
            <h1>Tell Us About Your <i>Goals</i></h1>
            <p>Connect directly with our editorial strategists. Every inquiry is reviewed within 24 business hours with transparent pricing and publication options.</p>
        </div>
    </section>

    <!-- Form & Contact Details Section -->
    <section>
        <div class="w">
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 40px; align-items: flex-start;">
                
                <!-- Contact Form Card -->
                <div class="card-dark" style="padding: 40px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--bd); padding-bottom: 18px; margin-bottom: 26px;">
                        <h2 style="text-align: left; font-size: 24px; margin: 0;">Placement Quote <i>Request</i></h2>
                        <span class="bd" style="font-size: 11.5px; padding: 4px 12px; border-color: var(--pu); color: var(--pu);">Confidential Review</span>
                    </div>

                    <form class="cf" action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="r2">
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Your Full Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Julian Hayes" required>
                                @error('name') <small style="color: var(--ac); display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                            </div>
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Work Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. j.hayes@company.com" required>
                                @error('email') <small style="color: var(--ac); display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="r2">
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Phone / WhatsApp (Optional)</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+1 (512) 000-0000">
                                @error('phone') <small style="color: var(--ac); display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                            </div>
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Company / Brand Name</label>
                                <input type="text" name="company" value="{{ old('company') }}" placeholder="e.g. Apex Global">
                                @error('company') <small style="color: var(--ac); display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="r2">
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Primary Industry</label>
                                <select name="service_name">
                                    <option value="" disabled {{ old('service_name') ? '' : 'selected' }}>Select Industry</option>
                                    <option value="Technology & AI" {{ old('service_name') == 'Technology & AI' ? 'selected' : '' }}>Technology & AI</option>
                                    <option value="Finance & FinTech" {{ old('service_name') == 'Finance & FinTech' ? 'selected' : '' }}>Finance & FinTech</option>
                                    <option value="Healthcare & BioTech" {{ old('service_name') == 'Healthcare & BioTech' ? 'selected' : '' }}>Healthcare & BioTech</option>
                                    <option value="Lifestyle & D2C" {{ old('service_name') == 'Lifestyle & D2C' ? 'selected' : '' }}>Lifestyle & D2C</option>
                                    <option value="Entertainment & Media" {{ old('service_name') == 'Entertainment & Media' ? 'selected' : '' }}>Entertainment & Media</option>
                                    <option value="Other Industry" {{ old('service_name') == 'Other Industry' ? 'selected' : '' }}>Other Industry</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Service Desired</label>
                                <select name="service_id">
                                    <option value="">Select Service (Optional)</option>
                                    @foreach($services as $serv)
                                        <option value="{{ $serv->id }}" {{ (old('service_id', request('service')) == $serv->id) ? 'selected' : '' }}>
                                            {{ $serv->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label style="display: block; font-size: 13.5px; color: var(--mut); margin-bottom: 6px;">Your Brand Narrative & Media Goals *</label>
                            <textarea name="message" rows="5" placeholder="Share a few sentences about your brand, current milestones, target publications (e.g. Forbes, Business Insider, TV, podcasts), and desired timeline..." required>{{ old('message') }}</textarea>
                            @error('message') <small style="color: var(--ac); display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                        </div>

                        <button class="btn bw" type="submit" style="width: 100%; justify-content: center; padding: 16px; margin-top: 8px;">
                            Submit Quote Request ↗
                        </button>
                    </form>
                </div>

                <!-- Contact Details & Offices Sidebar -->
                <div>
                    <!-- Direct Contacts -->
                    <div class="card-dark" style="margin-bottom: 24px;">
                        <h3 style="font-size: 20px; margin-bottom: 16px;">Direct Inquiries</h3>

                        <div style="margin-bottom: 16px;">
                            <span style="color: var(--mut); font-size: 13px; display: block; margin-bottom: 2px;">Editorial Email:</span>
                            <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'hey@veyoramedia.com') }}" style="color: var(--ac); font-weight: 500; font-size: 16px;">
                                {{ \App\Models\SiteSetting::get('contact_email', 'hey@veyoramedia.com') }}
                            </a>
                        </div>

                        <div style="margin-bottom: 16px;">
                            <span style="color: var(--mut); font-size: 13px; display: block; margin-bottom: 2px;">Phone Desk:</span>
                            <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone', '+1 (512) 649-8200') }}" style="color: #ffffff; font-weight: 500; font-size: 15px;">
                                {{ \App\Models\SiteSetting::get('contact_phone', '+1 (512) 649-8200') }}
                            </a>
                        </div>

                        <div>
                            <span style="color: var(--mut); font-size: 13px; display: block; margin-bottom: 4px;">Response Time:</span>
                            <span style="color: var(--pu); font-weight: 500; font-size: 14px;">Within 24 Business Hours</span>
                        </div>
                    </div>

                    <!-- Offices -->
                    <div class="card-dark" style="margin-bottom: 24px;">
                        <h3 style="font-size: 20px; margin-bottom: 16px;">Office Locations</h3>

                        <div style="border-bottom: 1px solid var(--bd); padding-bottom: 12px; margin-bottom: 12px;">
                            <h5 style="color: #ffffff; margin-bottom: 2px;">United States</h5>
                            <p style="color: var(--mut); font-size: 13.5px; margin: 0;">Austin, TX</p>
                        </div>

                        <div style="border-bottom: 1px solid var(--bd); padding-bottom: 12px; margin-bottom: 12px;">
                            <h5 style="color: #ffffff; margin-bottom: 2px;">Canada</h5>
                            <p style="color: var(--mut); font-size: 13.5px; margin: 0;">Calgary, AB</p>
                        </div>

                        <div>
                            <h5 style="color: #ffffff; margin-bottom: 2px;">United Kingdom</h5>
                            <p style="color: var(--mut); font-size: 13.5px; margin: 0;">London, UK</p>
                        </div>
                    </div>

                    <!-- Approval Guarantee -->
                    <div class="card-dark" style="border-color: var(--ac); background: rgba(255, 122, 89, 0.06);">
                        <div style="display: flex; gap: 14px; align-items: flex-start;">
                            <i class="bi bi-patch-check-fill" style="color: var(--ac); font-size: 26px;"></i>
                            <div>
                                <strong style="color: #ffffff; font-size: 15px; display: block; margin-bottom: 4px;">
                                    100% Pre-Approval Guarantee
                                </strong>
                                <p style="color: var(--mut); font-size: 13.5px; margin: 0; line-height: 1.55;">
                                    Every article, bio, and quote is sent for your signoff before anything is pitched or published.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
