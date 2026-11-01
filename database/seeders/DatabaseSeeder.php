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
            ['email' => 'admin@bylinebridge.com'],
            [
                'name' => 'Agency Administrator',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Services
        $services = [
            [
                'title' => 'Featured Profiles',
                'slug' => 'featured-profiles',
                'tagline' => 'Individual in-depth features on prominent online publications',
                'badge' => 'Signature Service',
                'icon' => 'bi-person-badge',
                'short_description' => 'Comprehensive biographical and strategic articles highlighting your founder story, corporate milestones, and specialized industry authority where investors, buyers, and partners look.',
                'full_description' => '<p>A Featured Profile is an individual, long-form editorial piece dedicated entirely to you, your company, and your leadership journey. Unlike fleeting social media posts, a published profile provides permanent digital equity that solidifies your Google search footprint and cements immediate credibility with prospective clients.</p>
                <p>Our editorial team conducts an in-depth strategy session to unearth your most compelling narrative angles—whether that is disruptive market traction, proprietary technology breakthroughs, or transformative leadership philosophies. We handle complete investigative drafting, rigorous fact-checking, and placement coordination with verified media outlets.</p>',
                'features' => [
                    'Comprehensive 1-on-1 strategic narrative interview',
                    'High-impact editorial angle framing tailored to target publications',
                    'Meticulous ghostwriting by veteran business and tech journalists',
                    'Full client review and approval prior to publication submission',
                    'Guaranteed live article link with permanent digital archiving',
                    'High-resolution press quote badge and social announcement toolkit',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Narrative Discovery', 'desc' => '60-minute interview and brand messaging audit to extract your unique leadership angle.'],
                    ['phase' => 'Stage 2', 'title' => 'Article Drafting', 'desc' => '1,200 to 1,800-word editorial feature crafted to publication guidelines.'],
                    ['phase' => 'Stage 3', 'title' => 'Client Signoff', 'desc' => 'Direct review cycle where your legal and marketing teams approve every word.'],
                    ['phase' => 'Stage 4', 'title' => 'Placement & Syndication', 'desc' => 'Live publication on authorized media platforms with verified reporting.'],
                ],
                'display_order' => 1,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Featured Profiles & Executive PR Placement | Byline Bridge',
                'seo_description' => 'Secure high-authority featured profiles in leading business magazines and trade publications to establish authoritative executive personal branding.',
            ],
            [
                'title' => 'Top-10 List Features',
                'slug' => 'top-10-lists',
                'tagline' => 'Inclusion in curated executive roundups and industry leaderboards',
                'badge' => 'High Social Proof',
                'icon' => 'bi-award',
                'short_description' => 'Strategic placement within curated industry roundups and prestigious top-10 lists, establishing benchmark status among top founders, CEOs, and category disruptors.',
                'full_description' => '<p>Being ranked among the top leaders in your sector delivers instant psychological validation to customers, board members, and potential talent. Our Top-10 List Features place your profile alongside recognized peers in technology, finance, healthcare, e-commerce, and enterprise consulting.</p>
                <p>We identify the right thematic listicles that align with your operational focus—such as "Top 10 Artificial Intelligence Innovators to Watch" or "Leading WealthTech Executives Transforming Modern Banking"—and pitch your inclusion with compelling editorial merit.</p>',
                'features' => [
                    'Evaluation of relevant thematic listicles and industry awards',
                    'Crisp executive bio and USP value-proposition pitch drafting',
                    'Placement in indexed, high-traffic editorial roundups',
                    'Official "Top 10" badge license for your website and sales decks',
                    'Syndication and backlink to your corporate digital properties',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Category Matching', 'desc' => 'Identification of active list features aligned with your industry niche.'],
                    ['phase' => 'Stage 2', 'title' => 'Profile Capsule Drafting', 'desc' => 'High-conversion executive summary emphasizing achievements and market impact.'],
                    ['phase' => 'Stage 3', 'title' => 'Editorial Submission', 'desc' => 'Placement coordination with managing editors and publication staff.'],
                    ['phase' => 'Stage 4', 'title' => 'Asset Delivery', 'desc' => 'Live link delivery plus embeddable verification badges for your digital channels.'],
                ],
                'display_order' => 2,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Top-10 Industry List Placements | Byline Bridge',
                'seo_description' => 'Get featured in curated industry Top 10 leaderboards and executive roundups to accelerate trust and market positioning.',
            ],
            [
                'title' => 'Byline Articles & Thought Leadership',
                'slug' => 'byline-articles',
                'tagline' => 'Contributed opinion columns and visionary essays under your name',
                'badge' => 'Category Authority',
                'icon' => 'bi-feather',
                'short_description' => 'Authoritative opinion pieces, market forecasts, and analytical commentary published under your byline across respected news platforms and business publications.',
                'full_description' => '<p>Nothing conveys deep authority quite like a thought-provoking article bearing your own byline. When decision-makers search for answers to complex industry challenges, finding an insightful essay written by you turns you from a vendor into an indispensable advisor.</p>
                <p>We work collaboratively with you to identify counter-intuitive insights, predict upcoming market shifts, or dissect regulatory hurdles. Our veteran writers translate your specialized perspective into engaging, publication-ready prose that editors eagerly accept.</p>',
                'features' => [
                    'Thematic topic mapping aligned with current news cycles and trends',
                    'Ghostwritten drafts reflecting your authentic executive tone and voice',
                    'Integration of proprietary data, case examples, and strategic frameworks',
                    'Zero-risk editorial workflow with complete review sovereignty',
                    'Targeted submission to reputable trade journals and mainstream business outlets',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'Thesis Development', 'desc' => 'Brainstorming 3-5 distinctive topic angles based on your operational insights.'],
                    ['phase' => 'Stage 2', 'title' => 'Column Ghostwriting', 'desc' => 'Rigorous writing adhering to standard publication word counts and guidelines.'],
                    ['phase' => 'Stage 3', 'title' => 'Client Revision', 'desc' => 'Fine-tuning nuance and company perspectives to your exact standard.'],
                    ['phase' => 'Stage 4', 'title' => 'Byline Publication', 'desc' => 'Published under your name with author headshot and biographical bio link.'],
                ],
                'display_order' => 3,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Byline Thought Leadership Articles | Byline Bridge',
                'seo_description' => 'Establish category leadership with ghostwritten opinion editorials and byline articles published in authoritative business and industry journals.',
            ],
            [
                'title' => 'Content Writing & Publishing Suite',
                'slug' => 'content-writing-publishing',
                'tagline' => 'End-to-end editorial research, multi-platform publishing, and reporting',
                'badge' => 'Comprehensive',
                'icon' => 'bi-journal-richtext',
                'short_description' => 'Full-service narrative management for organizations seeking structured, sustained media presence. From investigative journalism to multi-outlet coordination and live performance reporting.',
                'full_description' => '<p>Our Content Writing & Publishing Suite provides a complete media department for founders, executives, and organizations without the bloated overhead of conventional agency retainers. We operate on clear, measurable deliverables with upfront publication targets.</p>
                <p>We manage the entire lifecycle: narrative playbooks, quarterly content calendars, article writing, executive ghostwriting, editorial coordination, and transparent verification reports detailing domain authority, live URLs, and audience reach.</p>',
                'features' => [
                    'Comprehensive annual or quarterly corporate PR editorial roadmap',
                    'Dedicated senior editorial director and financial/tech writers',
                    'Multiple tier placements scheduled across strategic release windows',
                    'Multi-format adaptation for executive LinkedIn and newsletter channels',
                    'Exhaustive analytics reporting with permanent live URL tracking',
                ],
                'deliverables' => [
                    ['phase' => 'Stage 1', 'title' => 'PR Strategy Playbook', 'desc' => 'Comprehensive messaging pillars and publication target matrix.'],
                    ['phase' => 'Stage 2', 'title' => 'Editorial Production', 'desc' => 'Ongoing content drafting and revision sprints.'],
                    ['phase' => 'Stage 3', 'title' => 'Multi-Tier Placement', 'desc' => 'Simultaneous or staggered publication across tier-1 and trade platforms.'],
                    ['phase' => 'Stage 4', 'title' => 'Impact Dashboard', 'desc' => 'Detailed reporting with backlinks, domain scores, and distribution proof.'],
                ],
                'display_order' => 4,
                'is_active' => true,
                'is_featured' => true,
                'seo_title' => 'Content Writing & PR Publishing Management | Byline Bridge',
                'seo_description' => 'Full-lifecycle PR writing and media placement services with guaranteed live links, transparent reporting, and editorial excellence.',
            ],
        ];

        foreach ($services as $srvData) {
            Service::updateOrCreate(['slug' => $srvData['slug']], $srvData);
        }

        // 3. Case Studies
        $caseStudies = [
            [
                'title' => 'Scaling Series A Investor Credibility for Fintech Founder Julian Vance',
                'slug' => 'fintech-founder-julian-vance-series-a',
                'client_name' => 'Julian Vance',
                'client_designation' => 'Founder & CEO, NexaPay Global',
                'industry' => 'Fintech & Enterprise Payments',
                'publication_name' => 'Fintech Daily & Global Banking Review',
                'publication_url' => 'https://example.com/publications/nexapay-feature',
                'publication_badge' => 'Tier-1 Featured Profile',
                'campaign_objective' => 'Establish founder authority and technological pedigree ahead of a $12M institutional Series A financing round.',
                'challenge' => 'Despite having groundbreaking settlement infrastructure with $400M in annual run-rate volume, Julian was virtually unsearchable on Google. Venture capital firms conduct strict digital due diligence, and the absence of prominent media features was cited as an initial credibility hurdle.',
                'strategy' => 'Rather than a superficial corporate announcement, Byline Bridge structured an in-depth biographical profile centering on Julian\'s 12-year background navigating cross-border FX regulations. We framed his proprietary architecture as the missing bridge between legacy SWIFT rails and real-time ledger settlement.',
                'execution' => 'We drafted a 1,600-word feature article adhering to strict editorial standards. Following Julian\'s complete review and approval, the profile was placed in a recognized international fintech portal with permanent indexing, accompanied by a contributed byline on the future of enterprise treasury.',
                'results_metric' => '+380% Inbound Investor Outreach',
                'results_summary' => 'Within 30 days of publication, the article was circulated by two lead partners at Tier-1 VC funds. The Series A round closed 6 weeks ahead of schedule at an oversubscribed valuation.',
                'metrics_breakdown' => [
                    ['label' => 'Qualified VC Inbounds', 'value' => '18 Partners'],
                    ['label' => 'Google Search Rank for Name', 'value' => '#1 Position'],
                    ['label' => 'Time to Over-Subscription', 'value' => '42 Days'],
                ],
                'display_order' => 1,
                'is_published' => true,
                'is_featured' => true,
                'seo_title' => 'Case Study: Julian Vance Fintech PR Placement | Byline Bridge',
                'seo_description' => 'Learn how Byline Bridge positioned fintech CEO Julian Vance across top publications, accelerating an oversubscribed $12M Series A round.',
            ],
            [
                'title' => 'From Clinical Researcher to Global Biotech Voice: Dr. Elena Rostova',
                'slug' => 'dr-elena-rostova-biotech-authority',
                'client_name' => 'Dr. Elena Rostova',
                'client_designation' => 'Chief Scientific Officer, VITA BioLabs',
                'industry' => 'Biotechnology & Longevity Medicine',
                'publication_name' => 'Modern Healthcare Review & BioPharma Dispatch',
                'publication_url' => 'https://example.com/publications/vita-biolabs-feature',
                'publication_badge' => 'Executive Byline & Profile',
                'campaign_objective' => 'Position Dr. Rostova as an international authority on cellular longevity to facilitate commercial pharmaceutical licensing agreements.',
                'challenge' => 'Dr. Rostova had published 20+ academic papers, but academic journals do not reach commercial biotech corporate development executives. She needed mainstream executive credibility without compromising scientific rigor.',
                'strategy' => 'We translated complex mitochondrial rejuvenation data into a clear, compelling thesis on preventative corporate wellness and economic longevity. We pitched two byline commentaries examining the cost reduction for employer healthcare plans.',
                'execution' => 'Our science-specialized editorial team ghostwrote a twin series of thought leadership articles with comprehensive citations. Every medical claim was scrutinized and approved by Dr. Rostova\'s compliance board prior to placement.',
                'results_metric' => '$4.2M European Licensing Deal',
                'results_summary' => 'Following the publication, Dr. Rostova received keynote speaking invitations at three international life-science congresses and initiated discussions that culminated in a multi-million-dollar European distribution agreement.',
                'metrics_breakdown' => [
                    ['label' => 'Global Keynote Invites', 'value' => '3 Summits'],
                    ['label' => 'Licensing Deal Value', 'value' => '$4.2M'],
                    ['label' => 'Verified Readership', 'value' => '85,000+'],
                ],
                'display_order' => 2,
                'is_published' => true,
                'is_featured' => true,
                'seo_title' => 'Case Study: Dr. Elena Rostova Biotech Media Placement | Byline Bridge',
                'seo_description' => 'Discover how Dr. Elena Rostova leveraged byline articles and executive profiles to secure $4.2M in licensing partnerships.',
            ],
            [
                'title' => 'Boardroom Positioning for Cybersecurity CEO Marcus Sterling',
                'slug' => 'marcus-sterling-cybersecurity-positioning',
                'client_name' => 'Marcus Sterling',
                'client_designation' => 'Managing Director, SentinelShield Enterprise',
                'industry' => 'Cybersecurity & Enterprise Infrastructure',
                'publication_name' => 'Enterprise Security International',
                'publication_url' => 'https://example.com/publications/sentinelshield-marcus',
                'publication_badge' => 'Top 10 Feature + Cover Story',
                'campaign_objective' => 'Penetrate Fortune 500 Chief Information Security Officers (CISOs) with high-level zero-trust architecture thought leadership.',
                'challenge' => 'The cybersecurity market is plagued by hyperbolic marketing slogans. Enterprise CISOs routinely ignore cold emails and sponsored advertisements, demanding authentic technical authority.',
                'strategy' => 'We designed an executive byline discussing the legal liabilities of third-party SaaS vendors under upcoming SEC reporting standards, positioning Marcus as a risk-mitigation expert rather than a software salesperson.',
                'execution' => 'We secured Marcus\'s inclusion in an authoritative "Top 10 Cybersecurity Visionaries Defending Critical Infrastructure" roundup, supplemented by an analytical opinion article detailing supply-chain vulnerabilities.',
                'results_metric' => '4 Enterprise RFP Wins ($8.6M ACV)',
                'results_summary' => 'Procurement committees at three major financial institutions specifically cited Marcus\'s editorial insights during vendor evaluation audits.',
                'metrics_breakdown' => [
                    ['label' => 'Enterprise Contract Value', 'value' => '$8.6M ACV'],
                    ['label' => 'CISO Inbound Conversations', 'value' => '32 Leaders'],
                    ['label' => 'Editorial Social Shares', 'value' => '1,400+'],
                ],
                'display_order' => 3,
                'is_published' => true,
                'is_featured' => true,
                'seo_title' => 'Case Study: Marcus Sterling Enterprise PR | Byline Bridge',
                'seo_description' => 'How SentinelShield CEO Marcus Sterling used targeted PR placements to close $8.6M in enterprise contracts.',
            ],
            [
                'title' => 'Accelerating Retail Shelf Placement for Solara Organics',
                'slug' => 'solara-organics-d2c-to-retail-expansion',
                'client_name' => 'Camille Laurent',
                'client_designation' => 'Co-Founder & Chief Brand Officer',
                'industry' => 'Sustainable Consumer Goods & D2C',
                'publication_name' => 'Retail Trends Quarterly & Consumer Innovators',
                'publication_url' => 'https://example.com/publications/solara-organics',
                'publication_badge' => 'Featured Profile & Roundup',
                'campaign_objective' => 'Gain national retail buyer recognition for an organic personal care brand expanding from direct-to-consumer into 1,200 retail stores.',
                'challenge' => 'Online social ads had proven successful, but retail merchant buyers at Target and Whole Foods needed validation that Solara possessed sustainable consumer demand and ethical supply-chain certifications.',
                'strategy' => 'Framed Camille\'s direct farm-to-formula supply chain as the new benchmark for consumer transparency, establishing the brand\'s mission as ahead of retail sustainability trends.',
                'execution' => 'Coordinated a dual release: an individual founder profile detailing Camille\'s regenerative farming partnerships, followed by inclusion in a prestigious sustainable business leadership feature.',
                'results_metric' => '1,200+ National Retail Doors',
                'results_summary' => 'Buyer review teams noted the publication features during supplier onboarding, paving the way for nationwide endcap placement across 1,200 stores.',
                'metrics_breakdown' => [
                    ['label' => 'Retail Stores Landed', 'value' => '1,200 Doors'],
                    ['label' => 'Brand Search Surge', 'value' => '+215%'],
                    ['label' => 'Earned Media Impressions', 'value' => '180,000+'],
                ],
                'display_order' => 4,
                'is_published' => true,
                'is_featured' => false,
                'seo_title' => 'Case Study: Solara Organics Retail Expansion | Byline Bridge',
                'seo_description' => 'See how Solara Organics secured national retail distribution with strategic PR profiles and founder thought leadership.',
            ],
        ];

        foreach ($caseStudies as $csData) {
            CaseStudy::updateOrCreate(['slug' => $csData['slug']], $csData);
        }

        // 4. Testimonials
        $testimonials = [
            [
                'client_name' => 'Julian Vance',
                'client_designation' => 'Founder & CEO',
                'client_company' => 'NexaPay Global',
                'quote' => 'Byline Bridge delivered exactly what high-growth founders need: intelligent editorial writing that did not dumb down our technology, and placements in publications our investors actually read. The transparency around editorial timelines was completely refreshing.',
                'publication_featured_in' => 'Featured Profile in Fintech Daily',
                'rating' => 5,
                'display_order' => 1,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Dr. Elena Rostova',
                'client_designation' => 'Chief Scientific Officer',
                'client_company' => 'VITA BioLabs',
                'quote' => 'In biotechnology, scientific precision is paramount. Byline Bridge took the time to master our clinical data, respected our rigorous compliance review requirements, and secured media placements that directly generated international commercial partnerships.',
                'publication_featured_in' => 'Byline in Modern Healthcare Review',
                'rating' => 5,
                'display_order' => 2,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Marcus Sterling',
                'client_designation' => 'Managing Director',
                'client_company' => 'SentinelShield Enterprise',
                'quote' => 'Other PR agencies pitched us vague promises of celebrity magazine covers and delivered bottom-tier content farms. Byline Bridge did the opposite: honest expectations, meticulous journalistic drafting, and tier-one trade placements that directly influenced our enterprise pipeline.',
                'publication_featured_in' => 'Top 10 Feature in Enterprise Security',
                'rating' => 5,
                'display_order' => 3,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Claire Devereux',
                'client_designation' => 'General Partner',
                'client_company' => 'Apex Horizon Capital',
                'quote' => 'We now routinely recommend Byline Bridge to our portfolio founders. Their personal branding profiles establish instant executive authority ahead of institutional funding rounds and major corporate transactions.',
                'publication_featured_in' => 'Venture Advisor Partner',
                'rating' => 5,
                'display_order' => 4,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Camille Laurent',
                'client_designation' => 'Co-Founder',
                'client_company' => 'Solara Organics',
                'quote' => 'The editorial team captured my voice authentically from day one. Seeing our story published where major retail category buyers source new brands transformed our distribution talks completely.',
                'publication_featured_in' => 'Retail Trends International',
                'rating' => 5,
                'display_order' => 5,
                'is_published' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $tData) {
            Testimonial::updateOrCreate(
                ['client_name' => $tData['client_name'], 'client_company' => $tData['client_company']],
                $tData
            );
        }

        // 5. FAQs
        $faqs = [
            [
                'category' => 'Publications & Process',
                'question' => 'What publications and media platforms do you place articles in?',
                'answer' => 'We coordinate features, bylines, and roundups across recognized online business journals, technology portals, finance publications, and industry-specific trade magazines. Every placement is agreed upon upfront based on your target demographic, sector authority, and strategic objectives. We do not place content on obscure clickbait blogs.',
                'display_order' => 1,
                'is_published' => true,
            ],
            [
                'category' => 'Editorial Standards',
                'question' => 'Do I get to review and approve the article before it is submitted or published?',
                'answer' => 'Yes, 100%. We operate on a strict client pre-approval guarantee. No article, quote, or biographical detail is ever pitched or submitted to an editor without your explicit, written signoff. You maintain complete editorial control over how your brand, achievements, and data are presented.',
                'display_order' => 2,
                'is_published' => true,
            ],
            [
                'category' => 'Transparency',
                'question' => 'How do you distinguish between editorial, contributed, and sponsored placements?',
                'answer' => 'We uphold total transparency. Depending on the publication format and objective, placements may be contributed thought leadership columns, editorial list features, or verified brand profiles. We disclose the exact format, attribution guidelines, and indexing terms to you prior to commitment, ensuring your digital reputation remains unblemished.',
                'display_order' => 3,
                'is_published' => true,
            ],
            [
                'category' => 'Timelines & Delivery',
                'question' => 'What is the typical timeline from project kickoff to live publication?',
                'answer' => 'Our streamlined four-step workflow generally takes between 2 to 4 weeks from your initial strategy interview to live publication. Narrative drafting takes 5-7 business days, followed by your review window. Publication scheduling depends on the specific publication\'s editorial queue, which we track and communicate transparently.',
                'display_order' => 4,
                'is_published' => true,
            ],
            [
                'category' => 'Content Creation',
                'question' => 'Do I need to write anything myself, or does your team handle the writing?',
                'answer' => 'Our veteran journalists and editorial ghostwriters handle all researching, structuring, and drafting. You only need to participate in a 45-60 minute structured interview or share your key messaging bullet points. We synthesize your vision into publication-ready prose, leaving you free to run your company.',
                'display_order' => 5,
                'is_published' => true,
            ],
            [
                'category' => 'Business Model',
                'question' => 'How is this different from a traditional PR agency monthly retainer?',
                'answer' => 'Traditional PR agencies charge $8,000–$15,000 per month on long-term lock-in retainers with zero guarantee of measurable media coverage. Byline Bridge works on transparent, deliverable-backed placements. You know exactly what article is being written, where it will be placed, and what the final cost is—with no hidden retainers or ambiguous reporting.',
                'display_order' => 6,
                'is_published' => true,
            ],
            [
                'category' => 'Guarantees & Compliance',
                'question' => 'Do you guarantee Google ranking, viral reach, or immediate sales?',
                'answer' => 'We believe in honest, professional expectations. We guarantee the permanent publication of your approved article on the agreed-upon media outlet and full live URL verification. We do not make misleading claims regarding algorithmic Google rankings, guaranteed investor checks, or instant sales, as editorial authority is a foundational brand asset that works synergistically with your broader business operations.',
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

        // 6. Site Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Byline Bridge', 'group' => 'branding', 'label' => 'Agency Name', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'International PR, Media Placement & Executive Publishing', 'group' => 'branding', 'label' => 'Tagline', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'inquiries@bylinebridge.com', 'group' => 'contact', 'label' => 'Contact Email', 'type' => 'email'],
            ['key' => 'contact_phone', 'value' => '+1 (212) 895-4300', 'group' => 'contact', 'label' => 'Contact Phone', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => '450 Lexington Avenue, Suite 2800, New York, NY 10017', 'group' => 'contact', 'label' => 'Office Address', 'type' => 'text'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/byline-bridge', 'group' => 'social', 'label' => 'LinkedIn URL', 'type' => 'url'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/BylineBridge', 'group' => 'social', 'label' => 'X / Twitter URL', 'type' => 'url'],
            ['key' => 'footer_description', 'value' => 'Byline Bridge is a premier international PR and media publishing agency helping founders, CEOs, and industry leaders secure authoritative online coverage without the opacity of traditional retainers.', 'group' => 'footer', 'label' => 'Footer Description', 'type' => 'textarea'],
            ['key' => 'copyright_text', 'value' => '© '.date('Y').' Byline Bridge Agency. All editorial rights reserved.', 'group' => 'footer', 'label' => 'Copyright Text', 'type' => 'text'],
            ['key' => 'default_seo_title', 'value' => 'Byline Bridge | International PR, Media Placement & Publishing Agency', 'group' => 'seo', 'label' => 'Default SEO Title', 'type' => 'text'],
            ['key' => 'default_seo_description', 'value' => 'Position your expertise where your buyers read. We help founders, executives, and organizations secure published profiles, top-10 list features, and bylines in leading media outlets.', 'group' => 'seo', 'label' => 'Default SEO Description', 'type' => 'textarea'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // 7. Page Contents (Home, About, Founder)
        $contents = [
            // Home Hero
            ['page' => 'home', 'section' => 'hero', 'key' => 'badge', 'value' => 'The International Media Placement Agency', 'label' => 'Hero Top Badge'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'headline', 'value' => 'Your name in the byline. Your story where buyers read.', 'label' => 'Hero Main Headline'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'subtitle', 'value' => 'We help founders, CEOs, and industry pioneers build enduring market credibility through professionally authored profiles, curated list rankings, and high-impact byline articles.', 'label' => 'Hero Subtitle'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_primary_text', 'value' => 'Get Featured', 'label' => 'Primary CTA Text'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_primary_link', 'value' => '/contact', 'label' => 'Primary CTA Link'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_secondary_text', 'value' => 'Explore Placements', 'label' => 'Secondary CTA Text'],
            ['page' => 'home', 'section' => 'hero', 'key' => 'cta_secondary_link', 'value' => '/case-studies', 'label' => 'Secondary CTA Link'],

            // Home Intro
            ['page' => 'home', 'section' => 'intro', 'key' => 'eyebrow', 'value' => 'Editorial Authority vs. Fleeting Ads', 'label' => 'Intro Eyebrow'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'heading', 'value' => 'In a world crowded with noise, true editorial credibility cannot be faked.', 'label' => 'Intro Heading'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'body', 'value' => 'Buyers, investors, and enterprise decision-makers ignore unsolicited sales emails and paid social ads. But when they find an in-depth article analyzing your company\'s achievements or an authoritative opinion piece under your byline in a reputable publication, skepticism evaporates. Byline Bridge bridges the gap between your real-world expertise and international media visibility.', 'label' => 'Intro Body Paragraph'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_1_number', 'value' => '450+', 'label' => 'Stat 1 Number'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_1_label', 'value' => 'Verified Features Placed', 'label' => 'Stat 1 Label'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_2_number', 'value' => '100%', 'label' => 'Stat 2 Number'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_2_label', 'value' => 'Client Review Approval', 'label' => 'Stat 2 Label'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_3_number', 'value' => '18 Days', 'label' => 'Stat 3 Number'],
            ['page' => 'home', 'section' => 'intro', 'key' => 'stat_3_label', 'value' => 'Average Time to Live Link', 'label' => 'Stat 3 Label'],

            // Home Founder / About
            ['page' => 'home', 'section' => 'founder', 'key' => 'eyebrow', 'value' => 'From the Founders Desk', 'label' => 'Founder Eyebrow'],
            ['page' => 'home', 'section' => 'founder', 'key' => 'heading', 'value' => '"Traditional PR is broken. We built a publishing model based on transparency, rigorous writing, and real deliverables."', 'label' => 'Founder Quote Heading'],
            ['page' => 'home', 'section' => 'founder', 'key' => 'body', 'value' => 'For decades, legacy PR agencies treated media coverage like an opaque mystery—charging massive retainers while promising only "efforts." At Byline Bridge, we operate like an elite editorial newsroom. We pair founders with veteran journalists, craft stories worthy of respected publications, and ensure you approve every sentence before it goes live. No smoke. No mirrors. Just your name where it matters most.', 'label' => 'Founder Statement'],
            ['page' => 'home', 'section' => 'founder', 'key' => 'author_name', 'value' => 'Arthur Vance & Editorial Board', 'label' => 'Founder Name'],
            ['page' => 'home', 'section' => 'founder', 'key' => 'author_title', 'value' => 'Managing Director, Byline Bridge', 'label' => 'Founder Title'],

            // Why Us / Standards
            ['page' => 'home', 'section' => 'why_us', 'key' => 'heading', 'value' => 'The Byline Bridge Standard: Why Executives Choose Us', 'label' => 'Standards Section Heading'],
            ['page' => 'home', 'section' => 'why_us', 'key' => 'subtitle', 'value' => 'We believe professional media placement should be transparent, dignified, and aligned with your long-term reputation.', 'label' => 'Standards Subtitle'],

            // CTA
            ['page' => 'home', 'section' => 'cta', 'key' => 'heading', 'value' => 'Your next breakthrough story deserves to be told.', 'label' => 'CTA Section Heading'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'subtitle', 'value' => 'Schedule a confidential narrative consultation to discuss suitable media placements, publication availability, and strategic timing for your brand.', 'label' => 'CTA Subtitle'],
            ['page' => 'home', 'section' => 'cta', 'key' => 'button_text', 'value' => 'Request a Placement Quote', 'label' => 'CTA Button Text'],
        ];

        foreach ($contents as $c) {
            PageContent::updateOrCreate(
                ['page' => $c['page'], 'section' => $c['section'], 'key' => $c['key']],
                $c
            );
        }

        // 8. Sample Enquiries
        $sampleService = Service::first();
        $enquiries = [
            [
                'name' => 'Alexander Hayes',
                'email' => 'a.hayes@hayescapital.co',
                'phone' => '+1 (415) 890-2134',
                'company' => 'Hayes Capital Partners',
                'website' => 'https://hayescapital.co',
                'service_id' => $sampleService?->id,
                'service_name' => 'Featured Profiles',
                'target_publication' => 'Finance & Venture Publications',
                'budget_range' => '$5,000 - $10,000',
                'message' => 'We are preparing to announce our new $50M seed fund for climate tech in Q1. I want to secure an in-depth founder feature discussing our thesis on deep tech decarbonization.',
                'status' => 'new',
            ],
            [
                'name' => 'Sarah Lin, MD',
                'email' => 'slin@neurozenith.io',
                'phone' => '+1 (617) 555-8912',
                'company' => 'NeuroZenith Therapeutics',
                'website' => 'https://neurozenith.io',
                'service_id' => $sampleService?->id,
                'service_name' => 'Byline Articles',
                'target_publication' => 'Healthcare & BioTech Platforms',
                'budget_range' => '$10,000+',
                'message' => 'Looking to publish a 3-part byline series on neural interface ethics and regulatory hurdles ahead of our FDA phase-1 trials.',
                'status' => 'contacted',
            ],
            [
                'name' => 'David Sterling',
                'email' => 'david@aegiscloud.com',
                'phone' => '+44 20 7946 0912',
                'company' => 'Aegis Cloud Security',
                'website' => 'https://aegiscloud.com',
                'service_id' => $sampleService?->id,
                'service_name' => 'Top-10 List Features',
                'target_publication' => 'Enterprise Tech Media',
                'budget_range' => '$3,000 - $5,000',
                'message' => 'We would like to be considered for upcoming top cybersecurity innovator rankings.',
                'status' => 'in_progress',
            ],
        ];

        foreach ($enquiries as $enqData) {
            $enq = Enquiry::create($enqData);
            EnquiryNote::create([
                'enquiry_id' => $enq->id,
                'user_id' => $admin->id,
                'note' => 'Initial review completed. Client profile matches target editorial publication criteria. Scheduled consultation.',
            ]);
        }
    }
}
