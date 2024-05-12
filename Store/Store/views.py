from django.shortcuts import render

# Otras importaciones que puedas necesitar

def index(request):    
    return render(request, 'index.html')

