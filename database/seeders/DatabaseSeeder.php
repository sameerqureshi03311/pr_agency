<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Enquiry;
use App\Models\EnquiryNote;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@veyoramedia.com'],
            [
                'name' => 'Veyora Administrator',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Also ensure legacy admin email can still log in or points to admin
        User::updateOrCreate(
            ['email' => 'admin@bylinebridge.com'],
            [
                'name' => 'Veyora Administrator',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Services (6 Core Services for Veyora Media)
        $services = [
            [
                'title' => 'Press & Media Coverage',
                'slug' => 'press-media-coverage',
                'tagline' => 'Strategic press releases, tier-1 earned media, and broadcast distribution',
                'badge' => 'High Impact',
                'icon' => 'bi-newspaper',
                'short_description' => 'We get your story into the outlets your customers already trust. From pitching to follow-up to final publication, we handle the full process so your coverage lands with impact.',
                'full_description' => '<p>Earned press coverage is the bedrock of enduring brand credibility. At Veyora Media, we get your story into the outlets your customers, investors, and partners already trust. From pitch development and exclusive journalist outreach to follow-up and final syndication, our editorial team handles the entire campaign lifecycle so your coverage lands with maximum impact.</p>
                <p>We work with established media publications across the United States, United Kingdom, and Canada to ensure your milestone announcements, executive commentary, and brand milestones are indexed permanently where your target market looks.</p>',
                'features' => [
                    'Bespoke newsworthy angle development and press release crafting',
                    'Direct outreach to tier-1 journalists, editors, and industry correspondents',
                    'Full client review and approval prior to media pitching',
                    'Syndication across major national and regional business wires',
                    'Guaranteed live link verification and digital archiving',
                    'Media quote badges and social announcement graphics',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Narrative Discovery', 'desc' => 'In-depth interview to identify the most compelling hook for news desks.'],
                    ['phase' => 'Stage 2', 'title' => 'Release Drafting', 'desc' => 'AP-standard editorial press release tailored to publication criteria.'],
                    ['phase' => 'Stage 3', 'title' => 'Client Signoff', 'desc' => 'Direct review cycle where your team approves every word and quote.'],
                    ['phase' => 'Stage 4', 'title' => 'Media Pitching & Syndication', 'desc' => 'Targeted distribution and live placement tracking across verified outlets.'],
                ],
                'display_order' => 1,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Press & Media Coverage | Veyora Media',
                'seo_description' => 'Secure earned media coverage and top-tier news placement across the US, UK, and Canada with Veyora Media.',
            ],
            [
                'title' => 'Television Features',
                'slug' => 'television-features',
                'tagline' => 'Broadcast visibility, morning shows, and on-air executive guesting',
                'badge' => 'Broadcast Tier',
                'icon' => 'bi-tv',
                'short_description' => 'Show up on screen and let viewers see the face behind the brand. We shape your message, connect you with producers, and support you until you go live.',
                'full_description' => '<p>Television features give your brand unmatched visual authority. Having a founder or executive discuss market insights on regional or national broadcast television turns casual awareness into instantaneous consumer trust.</p>
                <p>Our broadcast booking specialists craft timely segment pitches, prepare custom talking points, and liaise directly with show producers across leading morning shows, business panels, and news networks.</p>',
                'features' => [
                    'Segment framing tailored to television broadcast producers',
                    'Executive on-air prep kit, sample Q&A, and talking points briefing',
                    'Direct booking with regional and national morning shows and panels',
                    'Broadcast clip licensing and digital rights assistance',
                    'High-resolution "As Seen On" broadcast badges for web & marketing decks',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Segment Angle Framing', 'desc' => 'Developing visually engaging story angles that fit broadcast producer needs.'],
                    ['phase' => 'Stage 2', 'title' => 'Producer Outreach', 'desc' => 'Direct pitching to news directors and segment producers in your target markets.'],
                    ['phase' => 'Stage 3', 'title' => 'On-Air Preparation', 'desc' => 'Executive prep call, media training briefing, and talking points synchronization.'],
                    ['phase' => 'Stage 4', 'title' => 'Broadcast & Licensing', 'desc' => 'Air date coordination, broadcast recording capture, and web licensing.'],
                ],
                'display_order' => 2,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Television Features & Broadcast Placements | Veyora Media',
                'seo_description' => 'Get featured on regional and national television broadcasts, business panels, and morning shows with Veyora Media.',
            ],
            [
                'title' => 'Magazine Features',
                'slug' => 'magazine-features',
                'tagline' => 'Prestigious print and digital magazine profiles and in-depth covers',
                'badge' => 'Signature Service',
                'icon' => 'bi-journal-bookmark',
                'short_description' => 'Be seen as a leading voice in your field. We pitch and secure editorial features that put your name in front of readers who matter.',
                'full_description' => '<p>A Magazine Feature is an individual, long-form editorial piece dedicated entirely to you, your company, and your leadership journey. Unlike fleeting ads, a published profile provides permanent digital equity that solidifies your search footprint and cements immediate credibility with prospective clients.</p>
                <p>Our editorial team conducts an in-depth strategy session to unearth your most compelling narrative angles—whether disruptive technology breakthroughs or transformative market leadership. We handle complete journalistic drafting, rigorous fact-checking, and placement coordination with verified media outlets.</p>',
                'features' => [
                    'Comprehensive 1-on-1 strategic narrative interview',
                    'High-impact editorial angle framing tailored to target magazines',
                    'Meticulous ghostwriting by veteran business and tech journalists',
                    'Full client review and approval prior to publication submission',
                    'Guaranteed live article link with permanent digital archiving',
                    'High-resolution magazine cover mockups and press quote badges',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Narrative Discovery', 'desc' => '60-minute interview and brand messaging audit to extract your unique story.'],
                    ['phase' => 'Stage 2', 'title' => 'Editorial Drafting', 'desc' => '1,200 to 1,800-word feature crafted to publication guidelines.'],
                    ['phase' => 'Stage 3', 'title' => 'Client Signoff', 'desc' => 'Direct review cycle where your legal and marketing teams approve every word.'],
                    ['phase' => 'Stage 4', 'title' => 'Placement & Syndication', 'desc' => 'Live publication on authorized media platforms with verified reporting.'],
                ],
                'display_order' => 3,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Magazine Features & Executive Profiles | Veyora Media',
                'seo_description' => 'Secure high-authority magazine features and executive profiles in leading business and trade publications with Veyora Media.',
            ],
            [
                'title' => 'Podcast Guesting',
                'slug' => 'podcast-guesting',
                'tagline' => 'High-conversion audio and video show appearances with niche audiences',
                'badge' => 'High Conversion',
                'icon' => 'bi-mic',
                'short_description' => 'Talk directly to engaged listeners. We match you with podcasts that fit your niche and manage the booking, prep, and scheduling for you.',
                'full_description' => '<p>Podcasts offer the highest listener engagement in modern digital media. Decision-makers and consumers listen to in-depth interviews during commutes and workouts, creating an intimate, high-trust bond with the guest.</p>
                <p>Veyora Media curates and vets top-performing podcasts in your vertical (Technology, Finance, Healthcare, Lifestyle, Entertainment), pitches you as a guest expert, coordinates recording logistics, and produces social promotional clips for your own channels.</p>',
                'features' => [
                    'Vertical-specific show curation and listenership vetting',
                    'Personalized guest pitch highlighting your core value propositions',
                    'Full pre-interview briefing packet with anticipated questions',
                    'Calendar scheduling and recording logistics management',
                    'Post-release episode syndication and promotional soundbites',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Show Curation', 'desc' => 'Researching verified, active shows matching your ideal client persona.'],
                    ['phase' => 'Stage 2', 'title' => 'Host Pitching', 'desc' => 'Direct pitching to show hosts and booking producers.'],
                    ['phase' => 'Stage 3', 'title' => 'Briefing & Prep', 'desc' => 'Preparation sheet with talking points, bio, and recommended soundbites.'],
                    ['phase' => 'Stage 4', 'title' => 'Syndication', 'desc' => 'Episode launch promotion across social media channels.'],
                ],
                'display_order' => 4,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Podcast Guesting Agency | Veyora Media',
                'seo_description' => 'Get booked on top industry podcasts to reach targeted listeners and build authentic founder authority with Veyora Media.',
            ],
            [
                'title' => 'Digital PR',
                'slug' => 'digital-pr',
                'tagline' => 'Authority backlinks, data-driven campaigns, and high-ranking coverage',
                'badge' => 'SEO & Visibility',
                'icon' => 'bi-globe2',
                'short_description' => 'Online coverage that reaches people wherever they browse. Through articles, brand mentions, and smart placements, we build visibility that grows stronger over time.',
                'full_description' => '<p>Modern PR and organic search rankings are intimately connected. Digital PR secures high-authority editorial mentions and clean contextual backlinks from indexed news platforms, supercharging both your brand authority and your domain ranking on Google.</p>
                <p>We blend creative storytelling with digital distribution to craft data-backed angles, expert quotes, and news commentary that editors eagerly link to.</p>',
                'features' => [
                    'Data-driven stories and industry survey commentary',
                    'High-authority follow editorial backlinks from news domains',
                    'Newsjacking opportunities on breaking industry developments',
                    'Comprehensive Google search engine visibility uplift',
                    'Real-time backlink monitoring and referral traffic analysis',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Campaign Ideation', 'desc' => 'Formulating newsworthy angles that align with current media cycles.'],
                    ['phase' => 'Stage 2', 'title' => 'Content & Data Synthesis', 'desc' => 'Drafting research-backed press assets and executive commentary.'],
                    ['phase' => 'Stage 3', 'title' => 'Digital Outreach', 'desc' => 'Outreach to online news editors and beat reporters.'],
                    ['phase' => 'Stage 4', 'title' => 'Impact Report', 'desc' => 'Live link delivery with domain authority and referral metrics.'],
                ],
                'display_order' => 5,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Digital PR & Authority Backlinks | Veyora Media',
                'seo_description' => 'Accelerate your digital prominence and search visibility with high-impact Digital PR campaigns from Veyora Media.',
            ],
            [
                'title' => 'Online Reputation Management',
                'slug' => 'online-reputation-management',
                'tagline' => 'Proactive SERP control, knowledge panels, and positive narrative amplification',
                'badge' => 'Reputation Protection',
                'icon' => 'bi-shield-check',
                'short_description' => 'Control what people find when they search for you. We track mentions, fix weak spots, and publish strong content so your image stays positive and consistent.',
                'full_description' => '<p>When prospective buyers or partners search your name or company, the first page of Google determines their decision. Online Reputation Management (ORM) proactively constructs an unshakeable digital fortress of positive, authoritative editorial content.</p>
                <p>We audit existing search results, optimize executive profiles, publish high-authority editorial assets that outrank negative or outdated mentions, and monitor sentiment across all major media channels.</p>',
                'features' => [
                    'Comprehensive Google page-1 SERP sentiment analysis',
                    'High-authority editorial publishing to occupy top search results',
                    'Executive biography and Knowledge Panel optimization',
                    'Crisis communications advisory and rapid narrative response',
                    'Continuous brand sentiment and mention monitoring',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Reputation Audit', 'desc' => 'Comprehensive diagnosis of existing SERP and search sentiment.'],
                    ['phase' => 'Stage 2', 'title' => 'Strategic Blueprint', 'desc' => 'Action plan prioritizing high-authority publishing properties.'],
                    ['phase' => 'Stage 3', 'title' => 'Content Placement', 'desc' => 'Deploying authoritative profiles and bylines to dominate page 1.'],
                    ['phase' => 'Stage 4', 'title' => 'Ongoing Monitoring', 'desc' => 'Continuous tracking to safeguard your positive search presence.'],
                ],
                'display_order' => 6,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Online Reputation Management (ORM) | Veyora Media',
                'seo_description' => 'Safeguard your executive and brand search results with proactive online reputation management from Veyora Media.',
            ],
        ];

        foreach ($services as $serviceData) {
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                $serviceData
            );
        }

        // 3. Case Studies (Tailored to Veyora Media's Core Industries)
        $caseStudies = [
            [
                'title' => 'Scaling Series A FinTech to 18 Tier-1 Publications in 90 Days',
                'slug' => 'fintech-series-a-placement',
                'client_name' => 'PayMatrix Global',
                'client_designation' => 'CEO & Founder',
                'industry' => 'Finance & FinTech',
                'publication_name' => 'Forbes & Financial Express',
                'publication_badge' => 'Tier 1 Finance',
                'campaign_objective' => 'Secured high-visibility feature coverage across leading financial media ahead of a $22M institutional funding round.',
                'challenge' => '<p>PayMatrix had built cutting-edge cross-border payment infrastructure but suffered from negligible public visibility. Traditional enterprise banking clients were hesitant to engage without third-party proof of technological maturity and corporate backing.</p>',
                'strategy' => '<p>Veyora Media crafted a high-impact narrative centered on the founder\'s technical pedigree and the economic efficiency of real-time cross-currency routing. We pitched exclusive features to enterprise banking correspondents and secured prominent magazine profile placements.</p>',
                'execution' => '<p>Coordinated multi-channel distribution across North American and UK financial news desks with client-approved thought leadership.</p>',
                'results_metric' => '+340% Deal Flow',
                'results_summary' => '<p>Published features in prominent financial outlets, resulting in an immediate 340% increase in inbound enterprise leads and direct mentions in VC investor memos.</p>',
                'metrics_breakdown' => [
                    ['label' => 'Tier-1 Features', 'value' => '18 Placements'],
                    ['label' => 'Inbound Deal Flow', 'value' => '+340%'],
                    ['label' => 'Estimated Impressions', 'value' => '2.4M Readers'],
                    ['label' => 'Time to Placement', 'value' => '16 Days'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Establishing Medical AI Category Leadership in US Healthcare',
                'slug' => 'medical-ai-healthcare-pr',
                'client_name' => 'Radix Health Systems',
                'client_designation' => 'Chief Medical Officer',
                'industry' => 'Healthcare & BioTech',
                'publication_name' => 'Healthcare Tech Outlook & MSN',
                'publication_badge' => 'Healthcare Tech',
                'campaign_objective' => 'Positioned an oncology AI diagnostic platform as the benchmark technology in hospital radiology departments.',
                'challenge' => '<p>Hospital procurement committees are deeply risk-averse. Radix needed authoritative external validation to reassure clinical chief medical officers that their predictive imaging algorithms complied with regulatory standards and delivered tangible diagnostic improvements.</p>',
                'strategy' => '<p>We formulated a 4-part thought leadership series authored under the Chief Medical Officer\'s byline, combined with in-depth profile coverage in healthcare magazines emphasizing clinical trials and hospital validation.</p>',
                'execution' => '<p>Targeted medical journals, health technology editors, and syndicated news wires across North America.</p>',
                'results_metric' => '$14.2M RFPs Won',
                'results_summary' => '<p>Placement in top healthcare publications established instant credibility during multi-million-dollar hospital RFP bidding cycles.</p>',
                'metrics_breakdown' => [
                    ['label' => 'Hospital RFPs Won', 'value' => '$14.2M'],
                    ['label' => 'Executive Bylines', 'value' => '4 Articles'],
                    ['label' => 'Social Amplification', 'value' => '45,000+ Engagements'],
                    ['label' => 'Search Dominance', 'value' => 'Page 1 SERP Clean'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Zero to Category Pioneer: B2B SaaS Cloud Infrastructure',
                'slug' => 'cloud-infrastructure-saas',
                'client_name' => 'StrataSphere Systems',
                'client_designation' => 'Chief Technology Officer',
                'industry' => 'Technology & Cloud',
                'publication_name' => 'VentureBeat & Tech Radar',
                'publication_badge' => 'Enterprise Tech',
                'campaign_objective' => 'Secured high-authority technical features highlighting Kubernetes optimization and multi-cloud resilience.',
                'challenge' => '<p>Entering a market dominated by legacy cloud monitoring giants, StrataSphere needed to establish unquestioned engineering authority to win early developer champions and enterprise CTO confidence.</p>',
                'strategy' => '<p>Veyora Media connected the engineering founders with senior cloud journalists, developing a data-driven narrative on cloud cost optimization and infrastructure scalability.</p>',
                'execution' => '<p>Devised technical whitepapers and executive commentary placed directly in leading developer publications.</p>',
                'results_metric' => '820+ Dev Signups',
                'results_summary' => '<p>Over 820 developer signups were directly attributed to the live feature within 48 hours of publication.</p>',
                'metrics_breakdown' => [
                    ['label' => 'Dev Signups', 'value' => '820+ Users'],
                    ['label' => 'Domain Authority Uplift', 'value' => '+18 Points'],
                    ['label' => 'Referral Traffic', 'value' => '12,500 Visits'],
                    ['label' => 'Media Reach', 'value' => '1.8M Viewers'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 3,
            ],
        ];

        foreach ($caseStudies as $csData) {
            CaseStudy::updateOrCreate(
                ['slug' => $csData['slug']],
                $csData
            );
        }

        // 4. Testimonials (Client Reviews)
        $testimonials = [
            [
                'client_name' => 'Elena Rostova',
                'client_designation' => 'Chief Executive Officer',
                'client_company' => 'Aetheris Robotics',
                'quote' => 'Veyora Media completely changed our go-to-market trajectory. Their placement commitment is real—we reviewed every draft before publication, and the resulting magazine features gave our enterprise sales team immediate leverage with Fortune 500 prospects.',
                'rating' => 5,
                'publication_featured_in' => 'Forbes & Tech Weekly',
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'client_name' => 'Marcus Vance',
                'client_designation' => 'Founder & Managing Partner',
                'client_company' => 'Vance & Sterling Capital',
                'quote' => 'In private equity, reputation is everything. Veyora Media took the time to understand our investment thesis and crafted articles that resonated deeply with institutional LPs. The client approval process was smooth, professional, and transparent.',
                'rating' => 5,
                'publication_featured_in' => 'Business Insider & Financial Times',
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'client_name' => 'Dr. Aris Thorne',
                'client_designation' => 'Chief Medical Officer',
                'client_company' => 'BioSyn Therapeutics',
                'quote' => 'Their content team is genuinely exceptional. They distilled our intricate clinical trial data into a gripping, accessible story that was picked up across major healthcare outlets. Our Google search presence is now impeccably authoritative.',
                'rating' => 5,
                'publication_featured_in' => 'Healthcare Technology Review',
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'client_name' => 'Julian Davies',
                'client_designation' => 'Head of Brand & Communications',
                'client_company' => 'Lumina Retail Technologies',
                'quote' => 'Working with Veyora Media was refreshing. No inflated agency retainers or vague promises—just transparent communication, rigorous editorial craftsmanship, and live links that delivered verifiable inbound interest.',
                'rating' => 5,
                'publication_featured_in' => 'Retail Innovation Hub',
                'is_featured' => true,
                'is_published' => true,
                'display_order' => 4,
            ],
        ];

        foreach ($testimonials as $tData) {
            Testimonial::updateOrCreate(
                ['client_name' => $tData['client_name'], 'client_company' => $tData['client_company']],
                $tData
            );
        }

        // 5. Frequently Asked Questions (From Doc & HTML)
        $faqs = [
            [
                'question' => 'What does Veyora Media do?',
                'answer' => 'Veyora Media helps brands get noticed through strategic PR, well-written articles, television features, magazine profiles, and publication on trusted media platforms. We handle the writing, pitching, and publishing from start to finish so you can focus on scaling your business.',
                'display_order' => 1,
                'is_published' => true,
            ],
            [
                'question' => 'Who do you work with?',
                'answer' => 'We work with startups, growing brands, founders, CEOs, and established enterprises across the US, UK, and Canada. Our clients come from key sectors including Technology, Finance, Healthcare, Lifestyle, and Entertainment.',
                'display_order' => 2,
                'is_published' => true,
            ],
            [
                'question' => 'What services do you provide?',
                'answer' => 'We provide 6 core services: Press & Media Coverage, Television Features, Magazine Features, Podcast Guesting, Digital PR, and Online Reputation Management. Each campaign is custom-tailored to your industry and growth goals.',
                'display_order' => 3,
                'is_published' => true,
            ],
            [
                'question' => 'Can you help growing brands?',
                'answer' => 'Yes. Growing brands are a foundational focus of our work. We build clear, deliverable-driven plans that help you gain credibility early, outshine competitors, and scale your market visibility as your revenue grows.',
                'display_order' => 4,
                'is_published' => true,
            ],
            [
                'question' => 'How long does it take to get published?',
                'answer' => 'Timelines depend on the publication tier and editorial cycle. After you approve the final content draft, most magazine and digital features go live within 2 to 4 weeks. We share the exact timeline with you before work begins.',
                'display_order' => 5,
                'is_published' => true,
            ],
            [
                'question' => 'Do I get to review the content before it goes live?',
                'answer' => 'Always. 100% client approval is our standard commitment. Every single article, bio, or quote is sent to you for review and signoff first, and nothing is ever submitted or published without your explicit confirmation.',
                'display_order' => 6,
                'is_published' => true,
            ],
            [
                'question' => 'How do I get started?',
                'answer' => 'Click "Get a Quote", share your brand goals and industry, and our editorial strategy team will respond with a tailored media plan, publication recommendations, and transparent pricing.',
                'display_order' => 7,
                'is_published' => true,
            ],
        ];

        foreach ($faqs as $faqData) {
            Faq::updateOrCreate(
                ['question' => $faqData['question']],
                $faqData
            );
        }

        // 6. Site Settings (Veyora Media Global Settings)
        $settings = [
            ['key' => 'site_name', 'value' => 'Veyora Media', 'group' => 'branding', 'label' => 'Agency Name', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'We Turn Your Story Into Lasting Visibility', 'group' => 'branding', 'label' => 'Tagline', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'hey@veyoramedia.com', 'group' => 'contact', 'label' => 'Contact Email', 'type' => 'email'],
            ['key' => 'contact_phone', 'value' => '+1 (512) 649-8200', 'group' => 'contact', 'label' => 'Contact Phone', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Austin, TX | Calgary, AB | London, UK', 'group' => 'contact', 'label' => 'Office Locations', 'type' => 'text'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/veyora-media', 'group' => 'social', 'label' => 'LinkedIn URL', 'type' => 'url'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/VeyoraMedia', 'group' => 'social', 'label' => 'X / Twitter URL', 'type' => 'url'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/veyoramedia', 'group' => 'social', 'label' => 'Instagram URL', 'type' => 'url'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/veyoramedia', 'group' => 'social', 'label' => 'Facebook URL', 'type' => 'url'],
            ['key' => 'footer_description', 'value' => 'Veyora Media is an international PR and content agency that turns press features into authority, inbound leads, and business growth that scales over time.', 'group' => 'footer', 'label' => 'Footer Description', 'type' => 'textarea'],
            ['key' => 'copyright_text', 'value' => '© 2026 Veyora Media. All rights reserved.', 'group' => 'footer', 'label' => 'Copyright Text', 'type' => 'text'],
            ['key' => 'default_seo_title', 'value' => 'Veyora Media | We Turn Your Story Into Lasting Visibility', 'group' => 'seo', 'label' => 'Default SEO Title', 'type' => 'text'],
            ['key' => 'default_seo_description', 'value' => 'PR & content for growing brands in the US, UK & Canada. We write, pitch, and publish your story on trusted media platforms, placing your brand where buyers and partners look.', 'group' => 'seo', 'label' => 'Default SEO Description', 'type' => 'textarea'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // 7. Page Contents (Home, About)
        $contents = [
            // Home Hero
            ['page' => 'home', 'section' => 'hero', 'key' => 'badge', 'value' => 'Trusted by growing brands across the US, UK & Canada', 'label' => 'Hero Top Badge'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'headline', 'value' => 'We Turn Your Story Into Lasting Visibility', 'label' => 'Hero Main Headline'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'subtitle', 'value' => 'Veyora Media is a PR and content agency that helps brands get noticed. We write, pitch, and publish your story on trusted media platforms, so the right audience finds you and remembers you.', 'label' => 'Hero Subtitle'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_primary_text', 'value' => 'Get Started ↗', 'label' => 'Primary CTA Text'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_primary_link', 'value' => '#contact', 'label' => 'Primary CTA Link'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_secondary_text', 'value' => 'Our Story ↗', 'label' => 'Secondary CTA Text'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_secondary_link', 'value' => '/about', 'label' => 'Secondary CTA Link'],

            // Home Stats
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_1_number', 'value' => '3', 'label' => 'Markets Served'],
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_1_label', 'value' => 'Markets Served (US, UK & Canada)'],
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_2_number', 'value' => '950+', 'label' => 'Published Articles'],
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_2_label', 'value' => 'Articles placed across premier publications'],
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_3_number', 'value' => '100%', 'label' => 'Client Approval'],
            ['page' => 'home', 'section' => 'stats', 'key' => 'stat_3_label', 'value' => 'On every article before it goes live'],

            // Home Why Us
            ['page' => 'home', 'section' => 'why_us', 'key' => 'heading', 'value' => 'Why Ambitious Brands Choose Veyora Media', 'label' => 'Why Us Heading'],
            ['page' => 'home', 'section' => 'why_us', 'key' => 'subtitle', 'value' => 'A simple, transparent process built around your growth.', 'label' => 'Why Us Subtitle'],

            // CTA
            ['page' => 'home', 'section' => 'cta', 'key' => 'badge', 'value' => 'Serving the US, UK & Canada', 'label' => 'CTA Badge'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'heading', 'value' => 'Ready to Put Your Brand in the Spotlight?', 'label' => 'CTA Section Heading'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'subtitle', 'value' => 'Share your goals with us, and we’ll create a PR and content plan built around your story, your industry, and your audience.', 'label' => 'CTA Subtitle'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'button_primary', 'value' => 'Get a Quote ↗', 'label' => 'Primary CTA Button'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'button_secondary', 'value' => 'Our Story ↗', 'label' => 'Secondary CTA Button'],
        ];

        foreach ($contents as $c) {
            PageContent::updateOrCreate(
                ['page' => $c['page'], 'section' => $c['section'], 'key' => $c['key']],
                $c
            );
        }

        // 8. Sample Enquiries
        $firstService = Service::first();
        $sampleEnquiries = [
            [
                'name' => 'Julian Henderson',
                'email' => 'j.henderson@crestviewcap.com',
                'phone' => '+1 (512) 555-0144',
                'company' => 'Crestview Capital',
                'website' => 'https://crestviewcap.com',
                'service_id' => $firstService?->id,
                'service_name' => 'Press & Media Coverage',
                'target_publication' => 'Forbes & Financial Media',
                'budget_range' => '$5,000 - $10,000',
                'message' => 'We are announcing our new Austin-based clean energy fund next month. We need strategic press coverage and founder profiles across North American business publications.',
                'status' => 'new',
            ],
            [
                'name' => 'Sophia Morales',
                'email' => 'sophia@lumosbiotech.co.uk',
                'phone' => '+44 20 7123 4567',
                'company' => 'Lumos BioTech UK',
                'website' => 'https://lumosbiotech.co.uk',
                'service_id' => $firstService?->id,
                'service_name' => 'Magazine Features',
                'target_publication' => 'Healthcare & BioTech Magazines',
                'budget_range' => '$10,000+',
                'message' => 'Seeking an in-depth magazine profile highlighting our clinical diagnostic breakthrough and UK-Canada cross-border expansion.',
                'status' => 'in_progress',
            ],
        ];

        foreach ($sampleEnquiries as $enqData) {
            $enq = Enquiry::create($enqData);
            EnquiryNote::create([
                'enquiry_id' => $enq->id,
                'user_id' => $admin->id,
                'note' => 'Initial inquiry received via Veyora Media website. Scope matches tier-1 editorial placement criteria.',
            ]);
        }
    }
}
