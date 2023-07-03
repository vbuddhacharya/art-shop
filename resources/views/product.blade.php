<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/prod.css')}}">
    <title>Art Details</title>
</head>
<body>
    <nav></nav>
    <main>
        <div class="main-section">
            <div class="detail-section">
                <div class="product-img">
                    <img src="{{asset('images/art/1.jpg')}}" alt="Product Image">
                </div>
                <div class="details">
                    <div class="title">Beauty in Tradition
                        <div class="artist">ArtistCha</div>
                    </div>
                    
                    <div class="info">
                        <div class="desc-title">About the artwork</div>
                        <div class="desc">
                            <div class="de">Description</div>
                            A girl dressed traditionally with her hand under her chin. This is one of my favourite art that I've done.
                        </div>
                        <div class="cat">
                            <div class="de">Details</div>
                            Category: Pencil Color Sketch
                            <div class="size">
                                Size: A4 <br>
                                Material: Paper
                            </div>
                            
                        </div>
                        
                        
                        <div class="delivery">
                            <div class="de">Delivery Information</div>
                            Frame Included: No
                            <div>
                                Delivery Time: 7 days
                            </div>
                            <div class="stock">Available: Yes</div>
                            <div>Artist Contact: 9823541875</div>
                        </div>
                        
                    </div>
                    <div class="other">
                        <div class="price">Rs 1000</div>
                        
                    </div>
                    <form action="/" style="width:100%">
                        <div class="order"> 
                            <div class="qn">
                                <label for="quantity">Quantity 
                                    {{-- <input type="number" name="quantity" id="quantity" value="1" min="1" max="5"> --}}
                                    <select name="quantity" id="quantity">
                                        @for($i=1; $i<=5; $i++)
                                            <option value="{{ $i }}" @if($i == 1) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </label>
                            </div>
                            <div class="buttons">
                                <button type="submit" value="buy">Buy</button>
                                <button type="submit" value="cart">Add to Cart</button>
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>