@extends('frontends.liquid-vestor.master')
@section('breadcrumb')
<div class="uk-section uk-padding-remove-vertical in-liquid-breadcrumb">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb">
                    <li><a href="#home">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 uk-text-center uk-margin-medium-bottom">
                    <h2>Company <span class="in-highlight">legal docs.</span></h2>
                </div>
                <div class="uk-grid-divider uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>
                    <div>
                      <div class="in-icon-wrap circle primary-color">
                        <i class="fas fa-file fa-lg"></i>
                      </div>
                        <h4 class="uk-margin-top">Terms of Service</h4>
                        <p>Read the Terms of Service and License Agreement for The Collective Portfolio Platform</p>
                            <li><a class="uk-button uk-button-text" href="/terms-of-service" target="_blank"><i class="fas fa-file-pdf fa-lg uk-margin-small-right"></i>Term of Services</a></li>
                        </ul>
                    </div>
                    <div>
                      <div class="in-icon-wrap circle primary-color">
                        <i class="fas fa-globe fa-lg"></i>
                      </div>
                        <h4 class="uk-margin-top">Policies</h4>
                        <p>Find out more about what information we collect at TCP (The Collective Portfolio), how we use it, and what control you have over your data.</p>
                        <ul class="uk-list uk-margin-top">
                            <li><a class="uk-button uk-button-text" href="/privacy-policy" target="_blank"><i class="fas fa-file-pdf fa-lg uk-margin-small-right"></i>Privacy Policy Statement</a></li>
                        </ul>
                    </div>
                    <div class="uk-visible@m">
                      <div class="in-icon-wrap circle primary-color">
                        <i class="fas fa-shield-alt fa-lg"></i>
                      </div>
                        <h4 class="uk-margin-top">Security</h4>
                        <p>Learn more about how we keep your work and personal data safe when you’re using our services.</p>
                        <ul class="uk-list uk-margin-top">
                            <li><a class="uk-button uk-button-text" target="_blank" href="https://find-and-update.company-information.service.gov.uk/company/12699120?fbclid=IwAR3PWSpmxYziSSeYsb1xozJLA144yjy3Xj5wg7BtXkArvTRT5_eUtpUdITk_aem_AUJqYksBJrdtBC_ry5q949ppjMkKhX0iEWge9Jdtu00CVnCWBlxDus61wLJhYnALgoBrTDcxwoKrTxVyrDUP0_iZ"><i class="fas fa-file-pdf fa-lg uk-margin-small-right"></i>Responsible Disclosure Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-3-5@m">
                    <h2 class="uk-margin-bottom uk-text-center">Company Faq.</h2>
                    <p class="uk-text-lead uk-text-muted uk-margin-remove uk-text-center">At {{ siteTitle() }} FAQ, we understand that clarity is key to fostering strong relationships with our customers.</p>
                    <p class="uk-text-center">
                        That's why we've created a comrehensive platform dedicated to answering all your queries and concerns. Whether you're curious about our products, services, or company policies, you'll find everything you need right here.
                    </p>
                    <ul class="in-faq-3 uk-margin-medium-top uk-accordion" data-uk-accordion="">
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">What is The Collective Portoflio?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>The Collective Portfolio offers an online cryptocurrency advisory service for portfolio management system, catering to the broader market using decentralized metrics. Our main goal is to empower clients to invest in cryptocurrencies such as Bitcoin and Altcoins with ease, safety, and responsibility. We assist customers in establishing, diversifying, and overseeing their portfolios, all while they retain complete ownership and control of their investments through automation.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">What are the advantages of using The Collective Portfolio?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Entering the realm of crypto investment requires no learning curve, exhaustive research, or administrative tasks. The Collective Portfolio handles all the necessary efforts. We provide complete transparency, ensuring customers retain full ownership of their account and funds.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">How is the portfolio built?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>We construct the portfolio by combining the deposit amount, risk level, and prevailing market conditions to optimize customer returns with the power of automation. At The Collective Portfolio, we subscribe to the notion that simplicity is brilliance, which is why we streamline your input while handling the intricate work behind the scenes.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">When will i receive my Collective portfolio?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Once you've deposited funds into your personally owned trading wallet on the collective portfolio, the portfolio allocation is finalized according to your individual preferences. Upon completion, you can instantly view the portfolio on your dashboard. Our algorithmic bot empowers users to effortlessly navigate the portfolio.</p>
                                                     </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">How can I send my money to make the investment on?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Depositing funds is swift and straightforward. Just log in to your account and proceed to the deposit page. You can deposit using various cryptocurrencies such as Bitcoin, Ethereum, BNB, Litecoin, and USDT.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">Is there any bonus offered on deposits?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Yes, we offer a generous 20% deposit bonus on all deposits made into your account. This bonus is automatically credited to your account upon successful completion of any deposit transaction.</p>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">How can I withdraw funds from my account?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>You can withdraw funds from your account by navigating to the "Wallet" section of your account dashboard and selecting your preferred withdrawal method. Follow the provided instructions to initiate the withdrawal process.</p>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">What are The Collective Portfolio’s fees??</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>At The Collective Portfolio, we hold the belief that complete transparency fosters trust, loyalty, and sustained engagement over the long term.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">How to diversify my portfolio?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Certainly! According to our value proposition, you possess complete ownership of your portfolio. Thus, you have the freedom to withdraw funds whenever you desire, directly to your bank account. Should you require any assistance in this process, we offer unlimited support to guide you through.</p>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">Is there any additional fees?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>Absolutely not! At The Collective Portfolio, we grasp the frustration that additional fees can bring, diminishing your investment. That's why we foster a robust company culture centered on offering complete transparency to our customers from the outset, ensuring there are no unexpected surprises.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">How will I pay for the services?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>You'll only incur charges on realized profits. Once your account reaches a 10% profit threshold, we'll automatically lock in the profit, issue an invoice for 15% of the realized profit, and adjust the baseline for calculating your next 10% profit.</p>
                            </div>
                        </li>
                        <li class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
                            <a class="uk-accordion-title" href="#">What are the withdrawal options available?</a>
                            <div class="uk-accordion-content" hidden="">
                                <p>We offer multiple withdrawal options including bank transfers, e-wallets, and cryptocurrencies. Choose the option that best suits your preferences and needs.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- section content end -->
@endsection