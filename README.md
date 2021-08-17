<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Mars Rover API Challenge

## About Project

<p>A squad of robotic rovers are to be landed by NASA on a plateau on Mars. This plateau, which is
curiously rectangular, must be navigated by the rovers so that their on board cameras can get a
complete view of the surrounding terrain to send back to Earth.</p>

<p>A rover's position and location is represented by a combination of x and y co-ordinates and a letter
representing one of the four cardinal compass points. The plateau is divided up into a grid to
simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom
left corner and facing North.</p>

<p>In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R' and
'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving from its
current spot. 'M' means move forward one grid point, and maintain the same heading.
Assume that the square directly North from (x, y) is (x, y+1).
Create a Web API to create and manage rovers. Resources must be created and managed via
RESTful endpoints.</p>

### Input :

To create a new plateau, some endpoint should accept X and Y parameters as the upper-right
coordinates.

To create a new rover, an endpoint should accept target plateau and deployment coordinates and
an initial heading direction.

Assuming there is a plateau and at least 1 rover, rovers will accept an array of commands in the
request body.

Example request body:
```
{
"commands": "LMLMLMLMM"
}
```

### Response

The response for each rover should be its final coordinates and heading.

Expected endpoints:
- Create plateau
- Get plateau
- Create rover
- Send commands to rover (sample request above)
- Get rover
- Get rover state

## Online Documentation

Please see **[Swagger Hub](https://app.swaggerhub.com/apis-docs/t3277/mars-rover/1.0.0)**
