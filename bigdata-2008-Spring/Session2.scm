
(+ 1 2)
;Value: 3

(* 3 4)
;Value: 12

(sqrt (+ (* 3 3) (* 4 4)))
;Value: 5

(define x 3)
;Value: x

(* x 5)
;Value: 15

(define foo 
  (lambda (x y) 
    (sqrt (+ (* x x) (* y y)))))

(define (foo x y)
  (sqrt (+ (* x x) (* y y))))

(foo 3 4)

(define (bar f x) (f (f x)))
(define (baz x) (* x x))

(bar baz 2)


(define (factorial n)
  (if (= n 1)
      1
      (* n (factorial (- n 1)))))

(factorial 6)

(define (factorial-iter n)
  (define (aux n top product)
    (if (= n top)
	(* n product)
	(aux (+ n 1) top (* n product))))
  (aux 1 n 1))

(factorial-iter 6)

(map (lambda (x) (* x x))
     '(1 2 3 4 5))

(fold + 0 '(1 2 3 4 5))

(fold * 1 '(1 2 3 4 5))

(define (sum-of-squares v)
  (fold + 0 (map (lambda (x) (* x x)) v)))

(sum-of-squares '(1 2 3 4 5))


