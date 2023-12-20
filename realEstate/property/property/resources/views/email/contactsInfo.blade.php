@php $contactsInfo = \App\Application\Model\contactsinfo::get(); @endphp

<section id="contact-info">
    <div class="center">
        <h2>{{ trans('website.how to reach us') }}</h2>
        <p class="lead">{{ trans('website.lead to contact') }}</p>
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <div class="gmap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51467.20830695133!2d37.22219413599484!3d36.27104909566982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152ffd01784fc311%3A0x57d3b5fa0a9e029b!2sAleppo+Industrial+City+-+Sheikh+Najjar%2C+Syria!5e0!3m2!1sen!2s!4v1533114597732"
                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                    </div>
                </div>

                @if (count($contactsInfo) > 0)
                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            @foreach ($contactsInfo as $d)
                                <li class="col-sm-6">
                                    <address>
                                        <h5>{{$d->title != '' ? $d->title_lang : ''}}</h5>
                                        <p>{{$d->body != '' ? $d->body_lang : ''}}</p>
                                        {!! $d->phone1 != '' ? "<p>".trans('contactsinfo.phone1') ." : ". $d->phone1."</p>" : '' !!}
                                        {!! $d->phone2 != '' ? "<p>".trans('contactsinfo.phone2') ." : ". $d->phone2."</p>" : '' !!}
                                        {!! $d->phone3 != '' ? "<p>".trans('contactsinfo.phone3') ." : ". $d->phone3."</p>" : '' !!}
                                        {!! $d->fax1 != '' ? "<p>".trans('contactsinfo.fax1') ." : ". $d->fax1."</p>" : '' !!}
                                        {!! $d->fax2 != '' ? "<p>".trans('contactsinfo.fax2') ." : ". $d->fax2."</p>" : '' !!}
                                        {!! $d->email != '' ? "<p>".trans('contactsinfo.email') ." : ". $d->email."</p>" : '' !!}
                                    </address>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
