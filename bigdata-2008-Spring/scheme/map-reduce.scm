;;(load "mergesortc.scm")

(define key car)
(define value cadr)

(define (x a b)
  (+ a b))

(define docs 
  '((1 ("the" "cat" "on" "the" "mat"))
    (2 ("cat" "and" "dog" "on" "the" "mat"))
    (3 ("the" "dog" "on" "the" "mat"))))

(define input '((1 1) (1 2) (1 3) (1 4)))

(define (wc-map kvp)
  (define (aux L)
    (if (= (length L) 1)
	(list (list (car L) 1))
	(cons (list (car L) 1)
	      (aux (cdr L)))))
  (aux (value kvp)))

(define (map mapper input)
  (if (= (length input) 1)
      (mapper (car input))
      (append (mapper (car input))
	      (map mapper (cdr input)))))

(define intermediate (map wc-map docs))

(define (go)
  (mergesort (map wc-map docs) 
	     (lambda (x y) (string<=? (car x) (car y)))))

(define i (go))

(group '(("a" 1) ("b" 2)))
(group '(("a" 1) ("a" 2)))
(group '(("a" 1) ("a" 2) ("b" 1)))
(group '(("a" 1) ("a" 3) ("a" 5)))
(group '(("a" 1) ("a" 3) ("a" 5) ("b" 2) ("b" 3)))
(group '(("a" 1) ("a" 3) ("a" 5) ("b" 2) ("b" 3) ("c" 32)))
(group (go))

(go)

(define (group kvps)
  (if (= (length kvps) 2)
      (if (string=? (key (first kvps)) (key (second kvps)))
	  (list (list (key (first kvps)) (value (first kvps)) (value (second kvps))))
	  kvps)
      (let ((res (group (cdr kvps))))
	(if (string=? (key (first kvps)) (key (second kvps)))
	    (append (list (append (first kvps) (cdr (car res)))) (cdr res))
	    (append (list (first kvps)) res)))))

(define x (group (go)))

(define (wc-reduce k vals)
  (list (list k (apply + vals))))

(wc-reduce (car (second x)) (cdr (second x)))

(define (reduce reducer input)
    (if (= (length input) 1)
      (reducer (caar input) (cdar input))
      (append (reducer (caar input) (cdar input))
	      (reduce reducer (cdr input)))))

(reduce wc-reduce x)

(define (map-reduce mapper reducer input)
  (reduce reducer
	  (group (mergesort (map mapper input) 
			    (lambda (x y) (string<=? (car x) (car y)))))))

(map-reduce wc-map wc-reduce docs)
